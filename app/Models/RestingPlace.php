<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\CemeterySection;

class RestingPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'cemeterySection_id',
        'image_id',
        'locator_id',
        'type'
    ];

    protected $appends = ['cemeterySection'];

    public function getcemeterySectionAttribute(){
        return CemeterySection::where('id', $this->cemeterySection_id)->first();
    }

}
