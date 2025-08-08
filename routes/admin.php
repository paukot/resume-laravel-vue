<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TranslationController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});


Route::group(['middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]], function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/translations/index', [TranslationController::class, 'index'])->name('translations.index');

    // User & Profile...
    Route::prefix('user')
        ->name('user.')
        ->group(function () {
        Route::get('/user/profile', [UserProfileController::class, 'show'])
            ->name('profile.show');

        Route::delete('/user/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
            ->name('other-browser-sessions.destroy');

        Route::delete('/user/profile-photo', [ProfilePhotoController::class, 'destroy'])
            ->name('current-user-photo.destroy');
    });
});
