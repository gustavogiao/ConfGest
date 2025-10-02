<?php

use App\Actions\Conference\FilterConferences;
use App\Models\Conference;
use App\Models\SpeakerType;
use Illuminate\Http\Request;

beforeEach(function () {
    SpeakerType::factory()->create(['id' => 1]);
});

it('filtra conferências pelo nome ou acrônimo', function () {
    // Cria conferências com speakers e sponsors
    $conference1 = Conference::factory()->hasSpeakers(1)->hasSponsors(1)->create([
        'name' => 'Laravel Conf',
        'acronym' => 'LARACON',
    ]);
    $conference2 = Conference::factory()->hasSpeakers(1)->hasSponsors(1)->create([
        'name' => 'PHP Summit',
        'acronym' => 'PHPSUM',
    ]);
    $conference3 = Conference::factory()->hasSpeakers(1)->hasSponsors(1)->create([
        'name' => 'VueJS Days',
        'acronym' => 'VUEJS',
    ]);

    // Pesquisa por "PHP"
    $request = Request::create('/', 'GET', ['search' => 'PHP']);
    $result = (new FilterConferences)->handle($request);

    expect($result->pluck('id'))->toContain($conference2->id)
        ->and($result->pluck('id'))->not->toContain($conference1->id)
        ->and($result->pluck('id'))->not->toContain($conference3->id);
});
