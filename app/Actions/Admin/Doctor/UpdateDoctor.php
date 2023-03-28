<?php

namespace App\Actions\Admin\Doctor;

use App\Models\User;
use App\Actions\StoreImage;
use App\Actions\HashPassword;

class UpdateDoctor
{

    private $processImage;
    private $hashPassword;

    const USER_TYPE = "doctor";

    public function __construct(StoreImage $processImage, HashPassword $hashPassword)
    {
        $this->processImage = $processImage;
        $this->hashPassword = $hashPassword;
    }

    public function handle(array $data, User $user)
    {

        $data['image'] = isset($data['image']) ? $this->processImage->processImage($data['image'], self::USER_TYPE) : $user->image;

        $data['password'] = isset($data['password']) ? $this->hashPassword->hashPassword($data['password']) : $user->password;


        return $user->update($data);
    }
}
