<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maid extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'religion',
        'age',
        'marital_status',
        'experience',
        'place_of_experience',
        'language',
        'skills',
        'package',
        'living_option',
        'domestic_worker',
        'office_fee',
        'monthly_payment',
        'photo',
        'video',
    ];
} 