<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    protected $table = 'collection';

    protected $fillable = [
        'warranty',
        'weight',
        'size',
        'length_of_sheets',
        'quantity_of_sheets',
        'quantity_of_boxes',
        'protrusion',
        'wind_min',
        'wind_max',
        'angle',
        'description',
        'description_title',
        'name'
    ];


}
