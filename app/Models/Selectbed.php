<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selectbed extends Model
{
    use HasFactory;

    protected $fillable = [
        'bed_no',
        'daily_rate',
        'monthly_rate',
        'bed_status',       
];

}
