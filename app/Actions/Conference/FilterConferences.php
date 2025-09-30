<?php

namespace App\Actions\Conference;

use App\Models\Conference;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class FilterConferences
{
    use AsAction;

    public function handle(Request $request)
    {
        $query = Conference::query()
            ->has('speakers')
            ->has('sponsors');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('acronym', 'like', "%{$search}%");
            });
        }

        return $query->paginate(10);

    }
}
