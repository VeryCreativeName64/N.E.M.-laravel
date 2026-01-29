<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
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
    public function show($id)
    {
        // Betöltjük a karaktert az összes felszerelt tárgyával együtt (Eager Loading)
        $character = Character::with(['equippedHat', 'equippedShirt', 'equippedPants', 'equippedShoes', 'equippedWeapon'])
            ->findOrFail($id);

        // Kiszámoljuk az összesített statisztikákat
        $totalHealth = $character->base_health + 
            ($character->equippedHat->plus_health ?? 0) +
            ($character->equippedShirt->plus_health ?? 0) +
            ($character->equippedPants->plus_health ?? 0) +
            ($character->equippedShoes->plus_health ?? 0);

        $totalDamage = $character->base_damage + ($character->equippedWeapon->plus_damage ?? 0);

        return view('characters.show', compact('character', 'totalHealth', 'totalDamage'));
    }

    /**
     * Tárgy felvétele (Equip)
     */
    public function equipItem(Request $request, Character $character)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'slot' => 'required|in:hat,shirt,pants,shoes,weapon'
        ]);

        $slot = $request->slot;
        $character->$slot = $request->item_id;
        $character->save();

        return back()->with('success', 'Tárgy sikeresen felszerelve!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
