<?php

namespace App\Actions;

class StoreImage
{

    public function processImage($file, $userType): string
    {
        $filename = now()->toTimeString() . $file->getClientOriginalName();

        $file->storeAs("public/images/$userType", $filename);

        return $filename;
    }
}
