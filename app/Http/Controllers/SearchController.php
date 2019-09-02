<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Client;
use App\Incident;
use App\Vehicle;
use App\Http\Resources\VehicleResource;

class SearchController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
       $search = $request->input('search');
       $brand_results = Brand::where('name', 'LIKE', '%'.$search.'%')->get();
       $client_results = Client::where('firstname', 'LIKE', '%'.$search.'%')
                                    ->orWhere('lastname', 'LIKE', '%'.$search.'%')
                                    ->get();
       $incident_results = Incident::where('id', 'LIKE', '%'.$search.'%')
                                    ->orWhere('created_at', 'LIKE', '%'.$search.'%')
                                    ->get();
       $vehicle_results = Vehicle::where('name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('model', 'LIKE', '%'.$search.'%')
                                    ->orWhere('color', 'LIKE', '%'.$search.'%')
                                    ->orWhere('type', 'LIKE', '%'.$search.'%')
                                    ->orWhere('registration', 'LIKE', '%'.$search.'%')
                                    ->get();
       return view('search.search')->with([
            'brands' => $brand_results,
            'clients' => $client_results,
            'incidents' => $incident_results,
            'vehicles' => $vehicle_results,
            'search_key' => $search
       ]);
    }

}
