<?php

namespace App\Models;

use App\Traits\Models\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static select(string $string, string $string1)
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasPermissions;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'restored_at',
        'restored_by',
        'deleted_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public function restoredBy(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'restored_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'deleted_by');
    }
}
