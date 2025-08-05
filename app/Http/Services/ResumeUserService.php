<?php

namespace App\Http\Services;

use App\Models\User;

class ResumeUserService
{
    public function getUser(): User
    {
        return User::where('display_on_resume', 1)->first();
    }
}
