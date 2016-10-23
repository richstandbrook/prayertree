<?php

namespace App\Http\Controllers;

use App\PrayerTree;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class prayerTreeController extends AuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayerTrees = Auth::user()->prayerTrees()->get();

        return response()->json($prayerTrees);
    }

    /**
     * Show the form for creating a new resource.
     *
     $user = Auth::user();
     */
    public function create()
    {
        return view('prayertree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prayerTree = new PrayerTree;
        $prayerTree->name = $request->get('name');
        $prayerTree->user_id = Auth::user()->id;
        $prayerTree->save();

        $data['prayertree_id'] = $prayerTree->pin;
        return redirect('/prayertree/'.$prayerTree->pin);
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
}
