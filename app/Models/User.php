<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_user';

    protected $primaryKey = 'user_id';

    protected $guarded = [];

    protected $connection = 'wolf';

    protected $with = [
        'userDetails',
    ];

    public function userDetails(): HasOne
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'user_id');
    }
}
