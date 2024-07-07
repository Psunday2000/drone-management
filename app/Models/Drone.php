<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'controller_id',
        'fleet_no',
        'battery_level',
        'is_active',
    ];

    public function controller(): BelongsTo{
        return $this-> belongsTo(User::class, 'controller_id');
    }

    public function disaster(): BelongsTo{
        return $this-> belongsTo(Disaster::class, 'drone_id');
    }
}
