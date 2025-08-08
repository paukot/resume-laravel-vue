<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Inertia\Inertia;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::orderByDesc('id')->paginate(10);

        return Inertia::render('Translation', compact('translations'));
    }
}
