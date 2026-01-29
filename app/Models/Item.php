<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'name', 'level', 'image', 'type', 'plus_health', 'plus_damage'
    ];

    // Ha le akarod kérdezni, kik viselik ezt a tárgyat (példaként a fegyver slotra)
    public function charactersAsWeapon(): HasMany
    {
        return $this->hasMany(Character::class, 'weapon');
    }
}
