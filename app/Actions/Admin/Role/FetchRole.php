<?php

namespace App\Actions\Admin\Role;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class FetchRole
{

    public function execute(): ?Collection
    {
        return Role::where('name', '!=', 'patient')->get();
    }
}
