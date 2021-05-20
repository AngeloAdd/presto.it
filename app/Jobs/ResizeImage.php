<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;


class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     
    private $path, $fileName, $width, $height;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $width, $height)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $width = $this->width;
        $height = $this->height;
        $srcPath = storage_path() . '/app/' . $this->path . '/' . $this->fileName;

        $destPath =  storage_path() . '/app/' . $this->path . "/crop{$width}x{$height}_" . $this->fileName;

        Image::load($srcPath)
            ->crop(Manipulations::CROP_CENTER, $width, $height)
            ->watermark(storage_path('app/img/logo.png'))
            ->watermarkPosition('bottom-right')
            ->watermarkPadding(20,20)
            ->watermarkWidth(30, Manipulations::UNIT_PIXEL)
            ->watermarkHeight(30, Manipulations::UNIT_PIXEL)
            ->watermarkFit(Manipulations::FIT_STRETCH)
            ->save($destPath);
    }
}
