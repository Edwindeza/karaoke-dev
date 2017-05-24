<?php

namespace App\Services\File;

use DateTime;

class UploadService {
    protected $type;
    protected $accept;
    protected $path;

    public function validate($extension){
        foreach ($this->accept as $value) {
            if($value == $extension)return true;
        }
        return false;
    }

    public function upload($file, $custom_name = null){
        $date = new DateTime();
        
        $name = $date->getTimestamp().'_'.$this->type;
        $name = str_replace(' ', '', $name);
        if($custom_name)
        {
            $name = $custom_name;
        }

        $upload_path = $this->path;
        $extension = $file->getClientOriginalExtension();

        if(!$this->validate($extension)){
            return null;
        }

        $file_path = $name.'.'.$extension;
        
        $file->move($upload_path, $file_path);

        return $upload_path.'/'.$file_path;
    }
}