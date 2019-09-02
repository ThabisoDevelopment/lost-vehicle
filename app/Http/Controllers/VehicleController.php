<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Http\Resources\VehicleResource;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createIncident(Request $request)
    {   
        $vehicle = new Vehicle();
        $vehicle->brand_id = $request->input('car_brand');
        $vehicle->name = $request->input('car_name');
        $vehicle->model = $request->input('car_model');
        $vehicle->color = $request->input('car_color');
        $vehicle->type = $request->input('car_type');
        $vehicle->registration = $request->input('car_reg');
        if ($vehicle->save()) {
            return redirect('/incident/create')->with('step3', $vehicle->name." Add Success!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function api($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return new VehicleResource($vehicle);
    }
}
