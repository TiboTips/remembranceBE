<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    protected $fillable = [
        "restingPlace_id",
        "firstName",
        "firstName2",
        "firstName3",
        "lastName",
        "dateOfBirth",
        "dateOfDeath",
        "isFullDateOfBirth",
        "isFullDateOfDeath",
        "isMilitary",
        "title",
        "isStillLivingPartner",
        "yearOfBirth",
        "yearOfDeath"
    ];
}
