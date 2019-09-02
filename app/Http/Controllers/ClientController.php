<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(9);
        return view('client.client')->with([
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
        $client = new Client();
        $client->firstname = $request->input('client_firstname');
        $client->lastname = $request->input('client_lastname');
        if ($client->save()) {
            return redirect('/clients')->with('success', 'New Client Created Succesful');
        }

    }

    public function createIncident(Request $request)
    {   
        $client = new Client();
        $client->firstname = $request->input('client_firstname');
        $client->lastname = $request->input('client_lastname');
        if ($client->save()) {
            return redirect('/incident/create')->with('step2', $client->firstname." Add Success!");
        }
    }
    public function skip()
    {
        return redirect('/incident/create')->with('step2', "Success!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if ($client->delete()) {
            return redirect('/clients')->with('success', 'Client Removed Succesful!');
        }
    }

    public function api($id)
    {
        $client = Client::findOrFail($id);
        return new ClientResource($client);
    }

}