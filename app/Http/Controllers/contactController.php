<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Contact;

class contactController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
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
        $contact = $this->requestToContact($request);
        $contact->save();
        // Respond with a JSON response similar to request
        return $this->formResponse($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        
        // Respond with contact as JSON response
        return $this->formResponse($contact);
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
        $contact = Contact::find($id);
        $contact = $this->requestToContact($request, $contact);
        $contact->save();
        
        return $this->formResponse($contact);
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
    
    private function requestToContact(Request $request, Contact $contact = null)
    {
        // Extract values from request
        $name = $request->input('name');
        $value = $request->input('value');
        $type = $request->input('type');
        
        if ($contact === null)
        {
            $contact = new Contact;
        }
        
        // Add values to Contact object
        $contact->name = $name;
        $contact->value = $value;
        $contact->type = $type;
        
        return $contact;
    }
    
    private function formResponse(Contact $contact)
    {
        return response()->json([
            'value' => $contact->value,
            'type' => $contact->type
        ]); 
    }
}
