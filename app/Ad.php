<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    public function propertyTypes()
    {
        return $this->belongsToMany(PropertyType::class, 'ad_property_type', 'ad_id');
    }

    public function propertyRules()
    {
        return $this->belongsToMany(PropertyRule::class, 'ad_property_rules', 'ad_id');
    }

    public function propertyAttributes()
    {
        return $this->belongsToMany(PropertyAttribute::class, 'ad_attr', 'ad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public static function getAds(array $request)
    {

        $search = isset($request['address']) ? $search = $request['address'] : null;
        $oLat = '';
        $oLng = '';
        isset($request['lat']) ? $oLat = $request['lat'] : '';
        isset($request['lng']) ? $oLng = $request['lng'] : '';

        $query = Ad::where('status_id',1);
        if(isset($search)){
            $query->whereRaw('MATCH (address) AGAINST (? in boolean mode)', array($search));
        }
        $dist = 'lng between (@origLon-@dist/cos(radians(@origLat))*69)
          and (@origLon+@dist/cos(radians(@origLat))*69)
          and lat between (@origLat-(@dist/69))
          and (@origLat+(@dist/69))';

//        $query = DB::raw('
//        set @origLon = ?; set @origLat = ?; set @dist = ?;
//          SELECT address, lat, lng, 6371 * 2 *
//          ASIN(SQRT( POWER(SIN((@origLat - lat)*pi()/180/2),2)
//          +COS(@origLat*pi()/180 )*COS(lat*pi()/180)
//          *POWER(SIN((@origLon-lng)*pi()/180/2),2)))
//          as distance FROM ads WHERE
//          MATCH (address) AGAINST ( ? in boolean mode)
//          having distance < @dist ORDER BY distance limit 100',[$oLat,$oLng,2,$search]);
//
        if (1 == 2) {
            $query->whereHas('propertyAttributes', function ($attrQuery) {
                $attrQuery->whereIn('id', [1, 2, 3]);
            });
        }
        if (1 == 2) {
            $query->whereHas('propertyTypes', function ($attrQuery) {
                $attrQuery->whereIn('id', [1, 2, 3]);
            });
        }
        if (1 == 2) {
            $query->whereHas('propertyRules', function ($attrQuery) {
                $attrQuery->whereIn('id', [1, 2, 3]);
            });
        }

        return $query->get();
    }
}
