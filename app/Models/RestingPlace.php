<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestingPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'cemeterySection_id',
        'image_id',
        'locator_id',
        'type'
    ];
}
