<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'location_id',
        'upload',
        'description',
        'created_by',
        'drone_id'
    ];

    public function category(): BelongsTo{
        return $this-> belongsTo(DisasterCategory::class, 'category_id');
    }
    public function location(): BelongsTo{
        return $this-> belongsTo(Location::class, 'location_id');
    }
    public function user(): BelongsTo{
        return $this-> belongsTo(User::class, 'created_by');
    }
    public function drone(): BelongsTo{
        return $this-> belongsTo(Drone::class, 'drone_id');
    }
}
