<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CemeterySection extends Model
{
    use HasFactory;

    protected $fillable = [
        'cemetery_id',
        'name'
    ];
}
