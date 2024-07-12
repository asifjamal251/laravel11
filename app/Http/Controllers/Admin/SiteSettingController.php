<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Project\ProjectCollection;
use App\Models\Country;
use App\Models\State;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PragmaRX\Countries\Package\Countries;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logo = SiteSetting::with(['siteLogo', 'siteFavicon'])->latest()->first();
        return view('admin.site-setting.index',compact('logo'));
    }

    public function logo(Request $request)
    {
        //dd($request->all());
        $logo = SiteSetting::latest()->first();
        $logo->title = $request->title;
        $logo->description = $request->description;
        $logo->email = $request->email;
        $logo->contact_no = $request->contact_no;
        $logo->country = $request->country;
        $logo->state = $request->state;
        $logo->city = $request->city;
        $logo->address = $request->address;


        if($request->input('logo')){
            foreach($request->logo as $file){
                $logo->logo = $file;
            } 
        }
        else{
            $logo->logo = Null;
        }  

        if($request->input('favicon')){
            foreach($request->favicon as $file){
                $logo->favicon = $file;
            } 
        }
        else{
            $logo->favicon = Null;
        }


       if($logo->save()){ 
            return redirect()->route('admin.site-setting.index')->with(['class'=>'success','message'=>'Site Information Save Successfully.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $roles = Role::select(['id','name'])->get()->pluck('name','id')->toArray();
        return view('admin.project.create',compact('roles'));
    }

    public function getAllCountry()
    {
        $countries = new Countries();

       

        $all_countries = $countries->all();
        echo "<ul>";
        foreach($all_countries as $country){
             dd($countries->where('cca3', 'ESB'));

            $country_store = new Country;
            $country_store->name = $country->name->common;
            $country_store->iso_code = $country->cca3;
            $country_store->flag_emoji = $country->flag['emoji'];
            $country_store->flag_svg = $country->flag['svg'];
            $country_store->calling_code = $country->calling_codes?$country->calling_codes[0]:'N/A';
            

            $country_currency = $countries->where('name.common', $country->name->common)->first()->hydrateCurrencies()->currencies;

            $test = $countries->where('cca3', 'ATA')->first()->hydrateCurrencies()->currencies;

            $country_store->currency = $country->currencies[0];
            

            //dd($test->first()->count());


            $country_store->currency_sign = $country_currency->first()->count()>0?$country_currency->first()->units->major->symbol:'N/A';

            $country_store->save();

            $states = $countries->where('name.common', $country->name->common)
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name')
            ->pluck('name', 'postal');

//echo $country->flag['svg'];
            // foreach($country->flag as $count_flag){
            //    echo "<li>".$count_flag ."</li>"; 
            // }
            
            // echo "<ul>";
            //     foreach($states as $state){
            //        echo "<li>".$state."</li>"; 
            //     }
            // echo "</li></ul>";

        }
        echo "</ul>";
    }


}
