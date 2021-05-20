<?php

namespace App\Jobs;

use App\Models\AnnouncementImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Core\ServiceBuilder;


class GoogleVisionFaceDetection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        if (!$image)
        {
            return;
        }

        $srcPath = storage_path('/app/' . $image->file);

        $imageContent = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($imageContent);

        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face){
            $vertices = $face->getBoundingPoly()->getVertices();

            $bounds = [];
            foreach ($vertices as $vertex) {
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $width = $bounds[2][0] - $bounds[0][0];
            $height = $bounds[2][1] - $bounds[0][1];

            Image::load($srcPath)
            ->watermark(storage_path('app/img/gugli.png'))
            ->watermarkPosition('top-left')
            ->watermarkPadding($bounds[0][0], $bounds[0][1])
            ->watermarkWidth($width, Manipulations::UNIT_PIXELS)
            ->watermarkHeight($height, Manipulations::UNIT_PIXELS)
            ->watermarkFit(Manipulations::FIT_STRETCH)
            ->save($srcPath);
        }
        $imageAnnotator->close();
    }
}
