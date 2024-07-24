<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollutedSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'S_Name',
        'Pollutant_type',
        'Region',
        'username',
        'Level_of_PH',
        'Amount_of_waste_materials'
    ];

}
