<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'badge_name',
        'badge_image',
    ];
}