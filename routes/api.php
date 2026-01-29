<?php


use App\Http\Controllers\CharacterController;
use App\Http\Controllers\QuestController;
use Illuminate\Support\Facades\Route;

// Karakter adatok lekérése
Route::get('/character/{id}', [CharacterController::class, 'show']);

// Harc indítása (adatok lekérése)
Route::get('/battle/{characterId}/{questId}', [QuestController::class, 'startBattle']);

// Harc eredményének mentése (ha a React-ben véget ért a harc)
Route::post('/battle/result', [QuestController::class, 'completeQuest']);