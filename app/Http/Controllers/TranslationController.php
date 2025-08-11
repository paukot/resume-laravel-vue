<?php

namespace App\Http\Controllers;

use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Translation\TranslationListRequest;
use App\Http\Services\TranslationService;
use App\Models\Translation;
use Inertia\Inertia;

class TranslationController extends Controller
{
    public function __construct(
        private readonly TranslationService $translationService
    )
    {
    }

    public function index(TranslationListRequest $request)
    {
        $types = $this->translationService->getTypes();
        $languages = $this->translationService->getLanguages();
        $translations = $this->translationService->getTranslations($request);

        return Inertia::render(
            'Translation/TranslationIndex',
            compact('translations', 'languages', 'types')
        );
    }

    public function create()
    {
        $types = $this->translationService->getTypes();
        $languages = $this->translationService->getLanguages();

        return Inertia::render(
            'Translation/TranslationCreate',
            compact('languages', 'types')
        );
    }

    public function store(StoreTranslationRequest $request)
    {
        try {
            Translation::create($request->validated());
        } catch (\Exception $e) {
            redirect()->back()->with('error', $e->getMessage());
        }

        return to_route(route: 'admin.translations.index', status: 303)
            ->with('status', 'Translation created!');
    }

    public function edit(Translation $translation)
    {
        $types = $this->translationService->getTypes();
        $languages = $this->translationService->getLanguages();

        return Inertia::render(
            'Translation/TranslationEdit',
            compact('translation', 'languages', 'types')
        );
    }


    public function update(Translation $translation, StoreTranslationRequest $request)
    {
        try {
            $translation->fill($request->validated())->save();
        } catch (\Exception $e) {
            redirect()->back()->with('error', $e->getMessage());
        }

        return to_route(route: 'admin.translations.index', status: 303)
            ->with('status', 'Translation updated!');
    }

    public function destroy(Translation $translation)
    {
        $translation->delete();

        return back(303)->with('status', 'Translation deleted!');
    }
}
