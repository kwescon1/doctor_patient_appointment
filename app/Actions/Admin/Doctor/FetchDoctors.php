<?php

namespace App\Actions\Admin\Doctor;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class FetchDoctors
{
    public function handle(): ?Collection
    {
        $doctorRole = Role::whereName('doctor')->first();

        return User::whereRoleId($doctorRole->id)->with('role')->get();
    }
}
