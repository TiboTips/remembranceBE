<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Image;

class CemeterySection extends Model
{
    use HasFactory;

    protected $fillable = [
        'cemetery_id',
        'name'
    ];

    protected $appends = ['cemetery'];

    public function getcemeteryAttribute(){
        return Cemetery::where('id', $this->cemetery_id)->first();
    }
    
}
