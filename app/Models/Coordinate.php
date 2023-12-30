<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Coordinate extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'latitude',
        'longitude',
        'address',
        'user_id',
    ];
}
