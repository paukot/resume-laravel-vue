<?php

namespace App\Http\Controllers;

use App\Http\Services\ResumeUserService;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function __invoke(ResumeUserService $resumeUserService)
    {
        Inertia::share('user', $resumeUserService->getUser());

        return Inertia::render('Welcome', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
