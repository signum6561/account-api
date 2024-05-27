<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'username',
        'fullname',
        'department',
        'position',
        'fake_create_at',
    ];
}
