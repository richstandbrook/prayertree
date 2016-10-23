<?php

namespace App\Http\Controllers;

use App\PrayerTree;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class prayerTreeController extends AuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prayerTrees = Auth::user()->prayerTrees()->get();

        if ($request->ajax()) {
            return response()->json($prayerTrees);
        }

        return view('prayertree.index', [
            'prayerTrees' => $prayerTrees
        ]);
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

        return response()->json($prayerTree);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prayerTree = PrayerTree::findOrFail(
            Hashids::decode($id)[0]
        );

        $prayerRequests = $prayerTree->requests()
            ->orderBy('created_at', 'desc')
            ->orderBy('approved', 'desc')
            ->get();

        return view('prayertree.view', [
            'prayerTree' => $prayerTree,
            'prayerRequests' => $prayerRequests
        ]);
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
