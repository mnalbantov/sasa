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
        $address = $request->input('address');
        $address = explode(',', $address);
        dump($request->all());

        $address = $this->formatAddress($address);

        $ads = Ad::getAds($request->all(),$address);

    }

    public function user($id)
    {
       return view('users.profile');
    }
    private function formatAddress(array $address)
    {
        $address = array_reverse($address);
        $street = '';
        $neighborhood = '';
        $city = '';
        $newAddr = array();
        unset($address[0]);
        if (count($address) == 3) {
            $newAddr['city'] = $address[1];
            $newAddr['neighborhood'] = $address[2];
            $newAddr['street'] = $address[3];
        }
        if (count($address) == 2) {
            $newAddr['city'] = $address[1];
            $newAddr['neighborhood'] = $address[2];
        }

        (count($address) == 1) ? $newAddr['city'] = $address[1] : '';

        return $newAddr;
    }

}
