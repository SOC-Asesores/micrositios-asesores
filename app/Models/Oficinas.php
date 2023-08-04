<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    use HasFactory;
    protected $fillable = [
        'office_name',
        'office_reference',
        'office_widget',
        'office_link',
        'office_white_logo',
        'office_logo',
        'office_address',
        'office_map',
    ];
}
