<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Http\Requests\StorepenggunaRequest;
use App\Http\Requests\UpdatepenggunaRequest;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index' , [
            'pengguna' => pengguna::all()
        ]);
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
     * @param  \App\Http\Requests\StorepenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepenggunaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepenggunaRequest  $request
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepenggunaRequest $request, pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengguna $pengguna)
    {
        //
    }
}
