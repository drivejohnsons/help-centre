<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Return the user's fullname.
     *
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return "$this->firstname $this->surname";
    }
}
