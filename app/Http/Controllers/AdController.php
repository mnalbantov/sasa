<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdsRequest;
use App\PropertyAttribute;
use App\PropertyType;

class AdController extends Controller
{

    //post requests only..
    public function getAds(AdsRequest $request)
    {
        echo "<pre>".print_r($request->all(),1)."</pre>";
        $address = $request->input('address');
        $addr = explode(',',$address);
        echo "<pre>".print_r($addr,1)."</pre>";

        $ads = Ad::getAds($request->all());
        foreach ($ads as $ad) {
            echo '<h2>'. $ad->address.'</h2><br/>';
            foreach ($ad->propertyTypes as $propertyType) {
                echo $propertyType->name;
            }
            foreach ($ad->propertyRules as $propertyRule) {
                echo '<span style="color: red;">'.$propertyRule->name.'</span>';
            }
        }
    }
}
