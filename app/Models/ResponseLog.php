<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResponseLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'controller_id',
        'description',
        'drone_id',
        'disaster_id',
    ];

    public function user(): BelongsTo{
        return $this-> belongsTo(User::class, 'controller_id');
    }
    public function drone(): HasMany{
        return $this-> hasMany(Drone::class);
    }
    public function disaster(): HasMany{
        return $this-> hasMany(User::class);
    }
}
