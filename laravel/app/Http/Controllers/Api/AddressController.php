<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;
use App\Models\address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AddressCollection(address::all());
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
        $request->validate([
            'street' => 'required',
            'number' => 'required',
            'number_int' => '',
            'suburb' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'user_id' => 'required'
        ]);
        $address = address::create($request->all());
        return new AddressResource($address);
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
        $address = DB::table('address')->where('id', $id)->first();
        return redirect()->action('AddressController@update')->with([$request => $address]);
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
        $address = DB::table('address')->where('id', $request->$id)->insert([
            'id' => $request->$id,
            'street' => $request->$street,
            'number' => $request->$number,
            'number_int' => $request->$number_int,
            'suburb' => $request->$suburb,
            'state_id' => $request->$state_id,
            'country_id' => $request->country_id,
            'user_id' => $request->user_id
        ]);
        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = DB::table('address')->where('id', $id)->delete();
        return new AddressCollection(address::all());
    }
}
