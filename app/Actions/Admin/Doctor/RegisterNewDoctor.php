<?php

namespace App\Actions\Admin\Doctor;

use App\Models\User;
use App\Actions\StoreImage;
use Illuminate\Http\Request;
use App\Actions\HashPassword;

class RegisterNewDoctor
{

    private $processImage;
    private $hashPassword;

    public function __construct(StoreImage $processImage, HashPassword $hashPassword)
    {
        $this->processImage = $processImage;
        $this->hashPassword = $hashPassword;
    }

    public function handle(array $data)
    {
        $userType = "doctor";

        $data['image'] = $this->processImage->processImage($data['image'], $userType);

        $data['password'] = $this->hashPassword->hashPassword($data['password']);

        return User::create($data);
    }
}
