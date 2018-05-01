<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyAttribute extends Model
{
    public function ad()
    {
        return $this->belongsToMany(Ad::class,'ad_attr','property_attribute_id');
    }
}
