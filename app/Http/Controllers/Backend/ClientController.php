<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Country;
use App\Models\Client;

class ClientController extends Controller
{
    public function client()
    {
        $agents = Agent::all();
        $countrys = Country::all();
        // $clients = Client::paginate(8);

        // relationship query section
        // $clients = Client::with('country','agent')->get();
        // $country = Country::with('client')->get();        
        // $country = Client::with('agent')->get();        
        // $country = Agent::with('clients')->get();       
        // return view('textRelation', compact('client'));

        $clients = Client::with('country','agent')->paginate(8);   

        return view('backend.client', compact('agents','countrys','clients'));
    }

    public function addClient(Request $request)
    {
        $clients = new Client();

        $request->validate([
            'firstName' => 'required',
            'lastname' => 'required',
            'txtphone' => 'required',
            'dtpDOB' => 'required',
            'cbxGender' => 'required',
            'txtAddress' => 'required',
            'txtPleaseOfBirth' => 'required',
            'txtPassportNum' => 'required',
            'txtNid' => 'required',
            'dtpPIssueDateS' => 'required',
            'dtpPIssueDateE' => 'required',
            'txtEName' => 'required',
            'txtERelation' => 'required',
            'txtEPhone' => 'required',
            'txtEAddress' => 'required',
            'cbxRefer' => 'required',
            'txtCAmount' => 'required',
            'txtAdvance' => 'required',
            'cbxCountry' => 'required',
        ]);

        // search passport number already taken or not
        $passportNum = $request->has('txtPassportNum') ? $request->get('txtPassportNum') : '';
        $passportNumExist = Client::where('passportNum', $passportNum)->first();
        if(isset($passportNumExist)){
            return redirect()->route('client.view')->with('error', 'Passport number already taken');
        }
        else
        {
            $clients->firstName = $request->has('firstName') ? $request->get('firstName') : '';
            $clients->lastname = $request->has('lastname') ? $request->get('lastname') : '';
            $clients->phone = $request->has('txtphone') ? $request->get('txtphone') : '';
            $clients->dob = $request->has('dtpDOB') ? $request->get('dtpDOB') : '';
            $clients->genderId = $request->has('cbxGender') ? $request->get('cbxGender') : '';
            $clients->address = $request->has('txtAddress') ? $request->get('txtAddress') : '';
            $clients->email = $request->has('txtEmail') ? $request->get('txtEmail') : '';
            $clients->plaseOfBirth = $request->has('txtPleaseOfBirth') ? $request->get('txtPleaseOfBirth') : '';
            $clients->passportNum = $request->has('txtPassportNum') ? $request->get('txtPassportNum') : '';

            // $clients->countryCode = $request->has('txtCountryCode') ? $request->get('txtCountryCode') : '';
            $clients->countryCode = 'BGD';

            $clients->nidNumm = $request->has('txtNid') ? $request->get('txtNid') : '';

            // $clients->passportAuthority = $request->has('txtPassportAuthority') ? $request->get('txtPassportAuthority') : '';
            $clients->passportAuthority = 'DIP/DHAKA';

            $clients->passportIssueDateStart = $request->has('dtpPIssueDateS') ? $request->get('dtpPIssueDateS') : '';
            $clients->passportIssueDateEnd = $request->has('dtpPIssueDateE') ? $request->get('dtpPIssueDateE') : '';
            // $clients->fatherName = $request->has('txtFName') ? $request->get('txtFName') : '';
            // $clients->motherName = $request->has('txtMName') ? $request->get('txtMName') : '';
            // $clients->spouseName = $request->has('txtSName') ? $request->get('txtSName') : '';
            // $clients->s_dob = $request->has('dtpSDOB') ? $request->get('dtpSDOB') : '';
            // $clients->s_address = $request->has('txtSAddress') ? $request->get('txtSAddress') : '';

            $clients->fatherName = NULL;
            $clients->motherName = NULL;
            $clients->spouseName = NULL;
            $clients->s_dob = NULL;
            $clients->s_address = NULL;

            $clients->emgName = $request->has('txtEName') ? $request->get('txtEName') : '';
            $clients->emgRelation = $request->has('txtERelation') ? $request->get('txtERelation') : '';
            $clients->emgAddress = $request->has('txtEAddress') ? $request->get('txtEAddress') : '';
            $clients->emgPhone = $request->has('txtEPhone') ? $request->get('txtEPhone') : '';
            $clients->referid = $request->has('cbxRefer') ? $request->get('cbxRefer') : '';
            $clients->countructAmount = $request->has('txtCAmount') ? $request->get('txtCAmount') : '';
            $clients->advance = $request->has('txtAdvance') ? $request->get('txtAdvance') : '';
            $clients->countryId = $request->has('cbxCountry') ? $request->get('cbxCountry') : '';

            // $clients->payMathod = $request->has('cbxPMethod') ? $request->get('cbxPMethod') : '';
            // $clients->payBankName = $request->has('txtPBankName') ? $request->get('txtPBankName') : '';
            // $clients->payAccountNum = $request->has('txtPAccountNum') ? $request->get('txtPAccountNum') : '';
            // $clients->remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';
            // $clients->pImg = $request->has('pImg') ? $request->get('pImg') : '';
            // $clients->passImg = $request->has('passImg') ? $request->get('passImg') : '';
            // $clients->nidImg = $request->has('nidImg') ? $request->get('nidImg') : '';
            // $clients->sNidImg = $request->has('sNidImg') ? $request->get('sNidImg') : '';

            $clients->payMathod = NULL;
            $clients->payBankName = NULL;
            $clients->payAccountNum = NULL;
            $clients->remark = 'N/A';
            $clients->pImg = NULL;
            $clients->passImg = NULL;
            $clients->nidImg = NULL;
            $clients->sNidImg = NULL;

            $clients->save();
            return redirect()->back()->with('success', 'Client added successfully');
        }
    }

    public function updateClient(Request $request, $id)
    {
        $agents = Agent::all();
        $countrys = Country::all();
        // $clients = Client::find($id);

        $clients = Client::with('country','agent')->find($id);   
        // dd($clients);     

        return view('backend.update_client', compact('agents','countrys','clients'));
    }

    public function editClient(Request $request, $id)
    {
        $clients = Client::find($id);

        $country = $request->has('cbxCountry') ? $request->get('cbxCountry') : '';
        $refer = $request->has('cbxRefer') ? $request->get('cbxRefer') : '';

        if($refer == 'Select Reference'){
            return redirect()->back()->with('error', 'Please select you reference');
        }

        if($country == 'Select country'){
            return redirect()->back()->with('error', 'Please select you country');
        }

        $request->validate([
            'firstName' => 'required',
            'lastname' => 'required',
            'txtphone' => 'required',
            'dtpDOB' => 'required',
            'cbxGender' => 'required',
            'txtEmail' => 'required',
            'txtAddress' => 'required',
            'txtPleaseOfBirth' => 'required',
            'txtPassportNum' => 'required',
            'txtCountryCode' => 'required',
            'txtPassAuth' => 'required',
            'txtNid' => 'required',
            'dtpPIssueDateS' => 'required',
            'dtpPIssueDateE' => 'required',
            'txtRemark' => 'required',
            'txtFatherName' => 'required',
            'txtMotherName' => 'required',
            // 'txtSpouseName' => 'required',
            // 'dtpSpouseDob' => 'required',
            // 'txtSpouseAddress' => 'required',
            'txtEName' => 'required',
            'txtERelation' => 'required',
            'txtEPhone' => 'required',
            'txtEAddress' => 'required',
            // 'cbxRefer' => 'required',
            'txtCAmount' => 'required',
            'txtAdvance' => 'required',
            // 'cbxCountry' => 'required',
        ]);

        

        $clients->firstName = $request->has('firstName') ? $request->get('firstName') : '';
        $clients->lastname = $request->has('lastname') ? $request->get('lastname') : '';
        $clients->phone = $request->has('txtphone') ? $request->get('txtphone') : '';
        $clients->dob = $request->has('dtpDOB') ? $request->get('dtpDOB') : '';
        $clients->genderId = $request->has('cbxGender') ? $request->get('cbxGender') : '';
        $clients->address = $request->has('txtAddress') ? $request->get('txtAddress') : '';
        $clients->email = $request->has('txtEmail') ? $request->get('txtEmail') : '';
        $clients->plaseOfBirth = $request->has('txtPleaseOfBirth') ? $request->get('txtPleaseOfBirth') : '';
        $clients->passportNum = $request->has('txtPassportNum') ? $request->get('txtPassportNum') : '';
        $clients->countryCode = $request->has('txtCountryCode') ? $request->get('txtCountryCode') : '';
        $clients->passportAuthority = $request->has('txtPassAuth') ? $request->get('txtPassAuth') : '';
        $clients->nidNumm = $request->has('txtNid') ? $request->get('txtNid') : '';
        $clients->passportIssueDateStart = $request->has('dtpPIssueDateS') ? $request->get('dtpPIssueDateS') : '';
        $clients->passportIssueDateEnd = $request->has('dtpPIssueDateE') ? $request->get('dtpPIssueDateE') : '';
        $clients->fatherName = $request->has('txtFatherName') ? $request->get('txtFatherName') : '';
        $clients->motherName = $request->has('txtMotherName') ? $request->get('txtMotherName') : '';
        $clients->spouseName = $request->has('txtSpouseName') ? $request->get('txtSpouseName') : '';
        $clients->s_dob = $request->has('dtpSpouseDob') ? $request->get('dtpSpouseDob') : '';
        $clients->s_address = $request->has('txtSpouseAddress') ? $request->get('txtSpouseAddress') : '';
        $clients->emgName = $request->has('txtEName') ? $request->get('txtEName') : '';
        $clients->emgRelation = $request->has('txtERelation') ? $request->get('txtERelation') : '';
        $clients->emgAddress = $request->has('txtEAddress') ? $request->get('txtEAddress') : '';
        $clients->emgPhone = $request->has('txtEPhone') ? $request->get('txtEPhone') : '';
        $clients->referid = $request->has('cbxRefer') ? $request->get('cbxRefer') : '';
        $clients->countructAmount = $request->has('txtCAmount') ? $request->get('txtCAmount') : '';
        $clients->advance = $request->has('txtAdvance') ? $request->get('txtAdvance') : '';
        $clients->countryId = $request->has('cbxCountry') ? $request->get('cbxCountry') : '';
        // $clients->payMathod = $request->has('cbxPMethod') ? $request->get('cbxPMethod') : '';
        // $clients->payBankName = $request->has('txtPBankName') ? $request->get('txtPBankName') : '';
        // $clients->payAccountNum = $request->has('txtPAccountNum') ? $request->get('txtPAccountNum') : '';

        if($request->has('facePhoto'))
        {
            $files = $request->file('facePhoto');
            $Imagelocation = array();
            $i=0;
            foreach($files as $file)
            {
                $extention = $file->getClientOriginalExtension();
                $fileName = 'face-'. time() . ++$i .'.'.$extention;
                $location = '/images/clients/';
                $file->move(public_path() . $location, $fileName);
                $Imagelocation[] = $location . $fileName;
                $clients->pImg = $fileName;
            }
        }

        if($request->has('PassportPhoto'))
        {
            $files = $request->file('PassportPhoto');
            $Imagelocation = array();
            $i=0;
            foreach($files as $file)
            {
                $extention = $file->getClientOriginalExtension();
                $fileName = 'pass-'. time() . ++$i .'.'.$extention;
                $location = '/images/clients/';
                $file->move(public_path() . $location, $fileName);
                $Imagelocation[] = $location . $fileName;
                $clients->passImg = $fileName;
            }
        }

        if($request->has('NIDPhoto'))
        {
            $files = $request->file('NIDPhoto');
            $Imagelocation = array();
            $i=0;
            foreach($files as $file)
            {
                $extention = $file->getClientOriginalExtension();
                $fileName = 'NID-'. time() . ++$i .'.'.$extention;
                $location = '/images/clients/';
                $file->move(public_path() . $location, $fileName);
                $Imagelocation[] = $location . $fileName;
                $clients->nidImg = $fileName;
            }
        }

        if($request->has('SpouseNID'))
        {
            $files = $request->file('SpouseNID');
            $Imagelocation = array();
            $i=0;
            foreach($files as $file)
            {
                $extention = $file->getClientOriginalExtension();
                $fileName = 'spouse-'. time() . ++$i .'.'.$extention;
                $location = '/images/clients/';
                $file->move(public_path() . $location, $fileName);
                $Imagelocation[] = $location . $fileName;
                $clients->sNidImg = $fileName;
            }
        }

        $clients->remark = $request->has('txtRemark') ? $request->get('txtRemark') : '';
        
        $clients->update();
        return redirect()->route('client.view')->with('success', 'Client updated successfully');
    }
}
