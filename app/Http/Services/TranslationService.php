<?php

namespace App\Http\Services;

use App\Http\Requests\Translation\TranslationListRequest;
use App\Models\Translation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class TranslationService
{
    public function getTranslations(TranslationListRequest $request): LengthAwarePaginator
    {
        $translations = Translation::query();

        if ($request->get('key')) {
            $translations->where('key', 'LIKE', "%{$request->get('key')}%");
        }

        if ($request->get('type')) {
            $translations->where('type', 'LIKE', "%{$request->get('type')}%");
        }

        $orderField = $request->get('order_field');
        $orderDirection = $request->get('order_direction', 'desc');

        if (!empty($orderField)) {
            $translations->orderBy($orderField, $orderDirection);
        } else {
            $translations->orderByDesc('id');
        }

        return $translations->paginate(
            perPage: $request->get('per_page', 5),
            page: $request->get('page', 1)
        );
    }

    public function getTypes(): Collection
    {
        return Translation::select('type')
            ->whereNotNull('type')
            ->groupBy('type')
            ->get()
            ->map(fn($item) => ['name' => $item->type, 'value' => $item->type]);
    }

    public function getLanguages(): Collection
    {
        return collect(config('app.supported_locales'))
            ->map(fn($item, $value) => ['name' => $item, 'value' => $value])
            ->values();
    }
}
