<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
  use HasFactory;

    protected $table='users_forms';
    protected $fillable = [
        'user_id',
        'form_data'
    ];

    protected $casts = [
        'form_data' => 'array'
    ];
}
