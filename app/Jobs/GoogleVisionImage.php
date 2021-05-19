<?php

namespace App\Jobs;

use App\Models\AnnouncementImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Core\ServiceBuilder;

class GoogleVisionImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $announcement_image_id;
    
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image = AnnouncementImage::find($this->announcement_image_id);
        if (!$image) { return; }

        $imageContent = file_get_contents(storage_path('/app/' . $image->file));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($imageContent);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();


        $likelihoodName = [
            'UNKNOWN', 'VERY_UNLIKELY', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'VERY_LIKELY'
        ];

        $image->adult = $likelihoodName[$adult];
        $image->medical = $likelihoodName[$medical];
        $image->spoof = $likelihoodName[$spoof];
        $image->violence = $likelihoodName[$violence];
        $image->racy = $likelihoodName[$racy];

        $image->save();
        
    }
}
