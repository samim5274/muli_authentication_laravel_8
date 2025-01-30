<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;

class AgentController extends Controller
{
    public function audenceAdmin()
    {
        $Agents = Agent::paginate(8);
        return view('backend.audence', compact('Agents'));
    }

    public function addAgent(Request $request)
    {
        $agent = new Agent();

        $request->validate([
            'txtagencyName' => 'required',
            'txtfastname' => 'required',
            'txtlastname' => 'required',
            'txtphone' => 'required',
            'txtEmail' => 'required',
            'txtAddress' => 'required',
            'txtRM' => 'required',
        ]);

        // Search email address
        $email = $request->has('txtEmail')? $request->get('txtEmail'):'';        
        $emailSearch = Agent::where('email', $email)->first();

        if(isset($emailSearch))
        {
            return redirect()->route('audence.Admin')->with('error','Email address already taken. Please try to different email account.');
        }
        else
        {
            $agent->agencyName = $request->has('txtagencyName') ? $request->get('txtagencyName') : '';
            $agent->firstname = $request->has('txtfastname')? $request->get('txtfastname'):'';
            $agent->lastname = $request->has('txtlastname')? $request->get('txtlastname'):'';
            $agent->email = $request->has('txtEmail')? $request->get('txtEmail'):'';
            $agent->phone = $request->has('txtphone')? $request->get('txtphone'):'';
            $agent->address = $request->has('txtAddress')? $request->get('txtAddress'):'';
            $agent->rln = $request->has('txtRM')? $request->get('txtRM'):'';

            $agent->save();
            return redirect()->route('audence.Admin')->with('success','Audence AGENT data added successfully.');
        }
    }

    public function updateAgentView($id)
    {
        $agent = Agent::find($id);
        return view('backend.admin.edit_agent', compact('agent'));
    }

    public function editAgentView(Request $request, $id)
    {
        $agent = Agent::find($id);

        $request->validate([
            'txtagencyName' => 'required',
            'txtfastname' => 'required',
            'txtlastname' => 'required',
            'txtphone' => 'required',
            'txtEmail' => 'required',
            'txtAddress' => 'required',
            'txtRM' => 'required',
        ]);

        $agent->agencyName = $request->has('txtagencyName') ? $request->get('txtagencyName') : '';
        $agent->firstname = $request->has('txtfastname')? $request->get('txtfastname'):'';
        $agent->lastname = $request->has('txtlastname')? $request->get('txtlastname'):'';
        $agent->email = $request->has('txtEmail')? $request->get('txtEmail'):'';
        $agent->phone = $request->has('txtphone')? $request->get('txtphone'):'';
        $agent->address = $request->has('txtAddress')? $request->get('txtAddress'):'';
        $agent->rln = $request->has('txtRM')? $request->get('txtRM'):'';

        $agent->update();
        return redirect()->route('audence.Admin')->with('success','Audence AGENT data updated successfully.');
    }

}
