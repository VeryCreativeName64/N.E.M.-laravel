<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'level', 'image', 'type', 'plus_health', 'plus_damage'
    ];

    public function charactersAsWeapon(): HasMany
    {
        // Ha a Character osztály piros marad, adj hozzá egy 'use App\Models\Character;' sort felülre
        return $this->hasMany(Character::class, 'weapon');
    }
}