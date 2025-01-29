<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function countryAdmin()
    {
        $countrys = Country::paginate(6);
        return view('backend.country', compact('countrys'));
    }

    public function AddCountry(Request $request)
    {
        $countryData = new Country();
        
        $request -> validate([
            'txtCountry' => 'required',
            'txtClientRate' => 'required',
            'txtClientAdvance' => 'required',
            'txtB2bRate' => 'required',
            'txtB2bAdvance' => 'required',
        ]);

        // country search
        $country = $request->has('txtCountry') ? $request->get('txtCountry') : '';
        $countrySearch = Country::where('countryName', $country)->first();

        if(isset($countrySearch))
        {
            return redirect()->route('country.Admin')->with('error','You already added this country. Please try to different country name.');
        }
        else
        {       
            $countryData->countryName = $request->has('txtCountry') ? $request->get('txtCountry') : '';
            $countryData->clientCost = $request->has('txtClientRate') ? $request->get('txtClientRate') : '';
            $countryData->clientAdvance = $request->has('txtClientAdvance') ? $request->get('txtClientAdvance') : '';
            $countryData->agentCost = $request->has('txtB2bRate') ? $request->get('txtB2bRate') : '';
            $countryData->agentAdvance = $request->has('txtB2bAdvance') ? $request->get('txtB2bAdvance') : '';
            $countryData->remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';

            $countryData->save();
            return redirect()->route('country.Admin')->with('success', 'Country added data successfully.');
            
        }
    }

    public function UpdateCountryView($id)
    {
        $country = Country::find($id);
        return view('backend.update_country', compact('country'));
    }

    public function editCountry(Request $request, $id)
    {
        dd($request->all());
    }
}
