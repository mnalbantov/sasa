<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyRule extends Model
{
    public function ad()
    {
        return $this->belongsToMany(Ad::class,'ad_property_rules','rule_id');
    }
}
