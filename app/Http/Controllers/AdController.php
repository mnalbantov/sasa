<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdRequest;
use App\Http\Requests\AdsRequest;
use App\Image;
use App\PropertyAttribute;
use App\PropertyRule;
use App\PropertyType;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];

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

//        return view('ads.post-ad',
//            [
//                'propertyAttributes' => PropertyAttribute::all(),
//                'propertyTypes' => PropertyType::all(),
//                'user' => Auth::user()
//            ]
//            );
    }

    public function getAdOptions()
    {
        $propAttr = PropertyAttribute::all();
        $propTypes = PropertyType::all();
        $propRules = PropertyRule::all();
        return response()->json([
            'propertyAttributes' => $propAttr,
            'propertyTypes' => $propTypes,
            'propertyRules' => $propRules,
            'user' => Auth::user(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdRequest $request)
    {

        echo json_encode($request->all());
        $neighborhood = $request->input('neighborhood');
        $zip_code = $request->input('zip_code');
        $utilityCosts = $request->input('utilityCosts');
        $roommates = $request->input('roommates');
        $availableAttr = $this->checkAttributes($request->input('chosenAttributes'));
        $availableType = $this->checkType($request->input('propertyType'));
        $condition = $request->input('condition');
        $mobileNumber = $request->input('mobileNumber');
        Session::put('attributes', $availableAttr);
        Session::put('propertyType', $availableType);
        Session::put('location', $request->input('location'));
        Session::put('lat', $request->input('lat'));
        Session::put('lng', $request->input('lng'));
        Session::put('title', $request->input('title'));
        Session::put('price', (float)$request->input('price'));
        Session::put('date-time', Carbon::now());
        Session::put('ad', true);
        isset($neighborhood) ? Session::put('neighborhood', $request->input('neighborhood')) : '';
        isset($zip_code) ? Session::put('zip_code', $request->input('zip_code')) : '';
        isset($utilityCosts) ? Session::put('utilityCosts', $request->input('utilityCosts')) : '';
        isset($roommates) ? Session::put('roommates', $request->input('roommates')) : '';
        isset($condition) ? Session::put('condition', $request->input('condition')) : '';
        isset($mobileNumber) ? Session::put('mobileNumber', $request->input('mobileNumber')) : '';
//        dd(Session::all());

//        return \redirect('ad/confirm');

    }

    public function preview(Request $request)
    {
        $neighborhood = $request->input('neighborhood');
        $zip_code = $request->input('zip_code');
        $utilityCosts = $request->input('utilityCosts');
        $roommates = $request->input('roommates');
        $availableAttr = $this->checkAttributes($request->input('propertyAttr'));
        $availableType = $this->checkType($request->input('propertyType'));
        $condition = $request->input('condition');
        $mobileNumber = $request->input('mobileNumber');
        Session::put('attributes', $availableAttr);
        Session::put('propertyType', $availableType);
        Session::put('location', $request->input('location'));
        Session::put('lat', $request->input('lat'));
        Session::put('lng', $request->input('lng'));
        Session::put('title', $request->input('title'));
        Session::put('price', (float)$request->input('price'));
        Session::put('date-time', Carbon::now());
        Session::put('ad', true);
        isset($neighborhood) ? Session::put('neighborhood', $request->input('neighborhood')) : '';
        isset($zip_code) ? Session::put('zip_code', $request->input('zip_code')) : '';
        isset($utilityCosts) ? Session::put('utilityCosts', $request->input('utilityCosts')) : '';
        isset($roommates) ? Session::put('roommates', $request->input('roommates')) : '';
        isset($condition) ? Session::put('condition', $request->input('condition')) : '';
        isset($mobileNumber) ? Session::put('mobileNumber', $request->input('mobileNumber')) : '';

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
        return PropertyType::where('id', $type)->first();
    }

    public function confirm()
    {
        if (Session::has('ad'))
            return view('ads.confirm', compact(Session::all()));

        return redirect()->route('post-ad');
    }

    public function load($type, $id = null)
    {
        $files = Image::where('type', $type)
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')->paginate(15);

        $response = [
            'pagination' => [
                'total' => $files->total(),
                'per_page' => $files->perPage(),
                'current_page' => $files->currentPage(),
                'last_page' => $files->lastPage(),
                'from' => $files->firstItem(),
                'to' => $files->lastItem()
            ],
            'data' => $files
        ];
        return $response()->json($response);
    }

    public function uploadImage(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 1000;
        $all_ext = implode(',', $this->allExtensions());

        $this->validate($request, [
            'name' => 'required|unique:files',
            'file' => 'required|file|mimes:' . $all_ext . '|max:' . $max_size
        ]);

        $model = new Image();

        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $type = $this->getType($ext);

        if (Storage::putFileAs('/public/' . $this->getUserDir() . '/' . $type . '/', $file, $request['name'] . '.' . $ext)) {
            return $model::create([
                'name' => $request['name'],
                'type' => $type,
                'extension' => $ext,
                'ad_id' => Auth::id()
            ]);
        }
        return response()->json(false);
    }

    /**
     * @param $ext
     * @return string
     */
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    private function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    private function getUserDir()
    {
        return Auth::user()->name . '_' . Auth::id();
    }
}
