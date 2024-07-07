<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(): BelongsTo{
        return $this-> belongsTo(Role::class);
    }

    public function drone(): HasMany{
        return $this-> hasMany(Drone::class, 'controller_id');
    }
    public function response_log(): HasMany{
        return $this-> hasMany(ResponseLog::class, 'controller_id');
    }
    public function disaster(): HasMany{
        return $this-> hasMany(Disaster::class, 'created_by');
    }

    public function responselog(): HasMany{
        return $this-> hasMany(ResponseLog::class);
    }
}
