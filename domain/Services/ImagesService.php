<?php

namespace domain\Services;

use App\Models\Image;

class ImagesService
{
    protected $images;

    public function __construct()
    {
        $this->images = new Image();
    }

    public function storeToPublic($file)
    {
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $name);

        return $this->images->create(['name' => $name]);
    }
}
