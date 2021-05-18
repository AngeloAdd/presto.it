<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnnouncementImage extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'announcement_id'];

    public function announcement() {
        return $this->belongsTo(Announcement::class);
    }


    static public function getUrlByFilePath($filePath, $width = null, $height = null) {

        if (!$width && !$height){

            return Storage::url($filePath);
        }
        
        $path = dirname($filePath);
        $fileName = basename($filePath);

        $file = "{$path}/crop{$width}x{$height}_{$fileName}";

        return Storage::url($file);
    }

    public function getUrl( $width = null, $height = null){
        return AnnouncementImage:: getUrlByFilePath($this->file, $width, $height);
    }


}
