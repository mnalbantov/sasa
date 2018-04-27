<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    public function ad()
    {
        return $this->belongsToMany(Ad::class,'ad_property_type','property_type_id');
    }
}
