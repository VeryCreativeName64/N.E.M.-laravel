<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $fillable = [
        'name', 'level', 'image', 'description', 'reward_money',
        'monster_name', 'monster_health', 'monster_damage', 'monster_image'
    ];
}
