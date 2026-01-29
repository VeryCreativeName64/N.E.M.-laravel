<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Quest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function startBattle($characterId, $questId): JsonResponse
    {
        $character = Character::with(['equippedHat', 'equippedShirt', 'equippedPants', 'equippedShoes', 'equippedWeapon'])
            ->findOrFail($characterId);
            
        $quest = Quest::findOrFail($questId);

        // Összesített statisztikák kiszámítása (mint a CharacterControllernél)
        $charHP = $character->base_health + 
            ($character->equippedHat->plus_health ?? 0) +
            ($character->equippedShirt->plus_health ?? 0) +
            ($character->equippedPants->plus_health ?? 0) +
            ($character->equippedShoes->plus_health ?? 0);

        $charAtk = $character->base_damage + ($character->equippedWeapon->plus_damage ?? 0);

        return response()->json([
            'player' => [
                'id' => $character->id,
                'name' => $character->name,
                'current_hp' => $charHP,
                'max_hp' => $charHP,
                'damage' => $charAtk,
            ],
            'monster' => [
                'name' => $quest->monster_name,
                'current_hp' => $quest->monster_health,
                'max_hp' => $quest->monster_health,
                'damage' => $quest->monster_damage,
                'reward_money' => $quest->reward_money
            ]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Quest $quest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quest $quest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quest $quest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quest $quest)
    {
        //
    }
}
