<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\UserData;

class HomeController extends Controller
{
    public function index(){
        $country = Country::get();
        return view('welcome', ['country' => $country]);
    }
    public function getStateByCountryid($country){
        $state = State::where('countruy_id', $country)->get();
        $stateArray = array();
        $n=0;
        foreach($state as $data){
            $stateArray[$n]['name'] = $data->name;
            $stateArray[$n]['id'] = $data->id;
            $n++;
        }
        return $stateArray;
    }
    public function getCityByStateid($state){
        $city = City::where('state_id', $state)->get();
        $cityArray = array();
        $n=0;
        foreach($city as $data){
            $cityArray[$n]['name'] = $data->name;
            $cityArray[$n]['id'] = $data->id;
            $n++;
        }
        return $cityArray;
    }
    public function saveData(Request $req){
        $userData = new UserData();
        $userData->name = $req->name;
        $userData->email = $req->email;
        $userData->mobile = $req->mobile;
        $userData->country = $req->country;
        $userData->state = $req->state;
        $userData->city = $req->city;
        $userData->save();
        return redirect()->back();
    }

    public function welComeLogic(Request $req){
        $country = Country::get();
        return view('welcome1', ['country' => $country]);
    }
}
