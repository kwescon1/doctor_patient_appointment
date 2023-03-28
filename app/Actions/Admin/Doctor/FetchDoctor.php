<?php

namespace App\Actions\Admin\Doctor;

use App\Models\User;

class FetchDoctor
{

    public function handle(int $id): ?object
    {

        return User::whereId($id)->first();
    }
}
