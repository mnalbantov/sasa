<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdsRequest;
use App\PropertyAttribute;
use App\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdController extends Controller
{

    /** post request only
     * @param AdsRequest $request
     */
    public function getAds(AdsRequest $request)
    {
        $address = $request->input('address');
        $address = explode(',', $address);
        dump($request->all());

        $address = $this->formatAddress($address);

        $ads = Ad::getAds($request->all(), $address);

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user($id)
    {
        return view('users.profile');
    }

    /**
     * @param array $address
     * @return array
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdForm()
    {
        return view('ads.post-ad');

        return view('ads.post-ad',
            [
                'propertyAttributes' => PropertyAttribute::all(),
                'propertyTypes' => PropertyType::all(),
                'user' => Auth::user()
            ]
            );
    }

    public function getAdOptions()
    {
        $propAttr = PropertyAttribute::all();
        $propTypes = PropertyType::all();

        return response()->json([
            'propertyAttributes' => $propAttr,
            'propertyTypes' => $propTypes,
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $availableAttr = $this->checkAttributes($request->input('propertyAttr'));
        $availableType = $this->checkType($request->input('propertyType'));
        Session::put('attributes',$availableAttr);
        Session::put('type',$availableType);

        return \redirect('ad/confirm');

    }

    /**
     * @param array $attributes
     * @return mixed
     */
    protected function checkAttributes($attributes = array())
    {
        return PropertyAttribute::whereIn('id', $attributes)->get();
    }

    /**
     * @param Int $type
     * @return mixed
     */
    protected function checkType(Int $type)
    {
       return PropertyType::where('id',$type)->first();
    }

    public function confirm()
    {
//        echo "<pre>".print_r(Session::all(),1)."</pre>";
        dd(Session::all());
    }

}
