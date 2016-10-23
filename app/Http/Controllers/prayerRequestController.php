<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Events\PrayerRequestApproved;
use App\PrayerRequest;
use App\PrayerTree;
use Illuminate\Http\Request;

use App\Http\Requests;
use Vinkla\Hashids\Facades\Hashids;

class prayerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prayerTreePin)
    {
        $id = Hashids::decode($prayerTreePin)[0];
        $requests = PrayerTree::find($id)->requests()->with('contact')->get();

        return response()->json($requests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($prayerTreePin)
    {
        return view('prayerrequest.create', [
            'prayertree_pin' => $prayerTreePin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $prayerTreePin)
    {
        $contact = Contact::where('value', $request->get('contact'))
            ->first();

        $prayerTree = PrayerTree::findOrFail(
            Hashids::decode($prayerTreePin)
        );

        $prayerRequest = new PrayerRequest;
        $prayerRequest->text = $request->get('text');
        $prayerRequest->prayerTree()->associate($prayerTree[0]);

        if ($contact) {
            $prayerRequest->contact = $contact;
        }

        $prayerRequest->save();

        return response()->json($prayerRequest);
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
        $prayerRequest = PrayerRequest::findOrFail($id);

        if ($text = $request->get('text')) {
            $prayerRequest->text = $text;
        }

        if ($request->get('approve')) {
            $prayerRequest->approved = true;
        }

        $prayerRequest->save();

        if ($request->get('approve')) {
            event(new PrayerRequestApproved($prayerRequest));
        }

        return response()->json($prayerRequest);
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
