<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'name'
    ];

    public function disaster(): HasMany{
        return $this-> hasMany(Disaster::class, 'location_id');
    }
}
