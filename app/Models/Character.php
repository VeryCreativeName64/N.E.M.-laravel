<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    protected $fillable = [
        'name', 'password', 'level', 'base_health', 'base_damage', 'money', 
        'hat', 'shirt', 'pants', 'shoes', 'weapon'
    ];

    // Rejtett mezők (pl. jelszó ne látsszon JSON válaszban)
    protected $hidden = ['password'];

    // Kapcsolatok a tárgyakhoz
    public function equippedHat(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'hat');
    }

    public function equippedShirt(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'shirt');
    }

    public function equippedPants(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'pants');
    }

    public function equippedShoes(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'shoes');
    }

    public function equippedWeapon(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'weapon');
    }
}