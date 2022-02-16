<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cemetery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'addressBus',
        'addressNumber',
        'addressStreet',
        'gpsX',
        'gpsY',
        'name',
        'town',
        'zipCode'
    ];
}
