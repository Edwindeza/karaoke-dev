<?php

namespace App\Services\File;

class UploadVideoService extends UploadService{

    public function __construct(){
        $this->type     = 'video';
        $this->accept   = config('accept.video');
        $this->path     = config('paths.uploads.video');
    }
}