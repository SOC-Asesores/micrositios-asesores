<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $fillable = [
        'name',
        'office_reference',
        'office_widget',
        'url',
        'agente_soc',
        'office_white_logo',
        'office_logo',
        'direccion',
        'office_map',
    ];
}
