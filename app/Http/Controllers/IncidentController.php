<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Incident;
use App\Brand;
use App\Vehicle;
use App\Client;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $incidents = Incident::orderBy('id', 'desc')->paginate(9);

        return view('incident.incident')->with([
            'incidents' => $incidents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::All();
        $vehicles = Vehicle::All();
        $clients = Client::All();

        return view('incident.incident-new')->with([
            'brands' => $brands,
            'vehicles' => $vehicles,
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incident = new Incident();
        $incident->client_id = $request->input('client_id');
        $incident->vehicle_id = $request->input('vehicle_id');
        $incident->brand_id = $request->input('brand_id');
        if ($incident->save()) {
            return redirect('/incidents')->with('success', 'Incident created Successful!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::FindOrFail($id);
        return view('incident.incident-show')->with([ 
            'incident' => $incident
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate(Request $request, $id)
    {
        $incident = Incident::FindOrFail($id);
        $incident->case_active = 1;
        if($incident->save()){
            return redirect('/incidents')->with('success', 'Incident Successful Activate!');
        }
    }
    public function deactivate(Request $request, $id)
    {
        $incident = Incident::FindOrFail($id);
        $incident->case_active = 0;
        if($incident->save()){
            return redirect('/incidents')->with('success', 'Incident Successful Deactivated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident = Incident::FindOrFail($id);
        if($incident->delete()){
            return redirect('/incidents')->with('success', 'Incident Successful Removed!');
        }
    }
}
