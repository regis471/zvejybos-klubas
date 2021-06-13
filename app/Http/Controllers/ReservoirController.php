<?php

namespace App\Http\Controllers;

use App\Models\Reservoir;
use Illuminate\Http\Request;
use Validator;

class ReservoirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservoirs = Reservoir::all();
        return view('reservoir.index', ['reservoirs' => $reservoirs]);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservoir.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'reservoir_title' => ['required', 'min:3', 'max:150'],
           'reservoir_area' => ['required','numeric', 'min:1', 'max:99.99'],
           'reservoir_about' => ['required']
       ],
       [
           'reservoir_area.numeric'=> ' Area must be a number.'
       ]
       
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }


        $reservoir = new Reservoir;
        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir successfully created!👍');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        return view('reservoir.show', ['reservoir' =>$reservoir]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('reservoir.edit', ['reservoir' => $reservoir]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $validator = Validator::make($request->all(),
       [
           'reservoir_title' => ['required', 'min:3', 'max:150'],
           'reservoir_area' => ['required', 'numeric', 'min:1'],
           'reservoir_about' => ['required', 'min:3']
       ],
        [
        'reservoir_area.numeric'=> ' Area must be a number.'
        ]
       
       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }



        $reservoir->title = $request->reservoir_title;
        $reservoir->area = $request->reservoir_area;
        $reservoir->about = $request->reservoir_about;
        $reservoir->save();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir edited!👍');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        if($reservoir->reservoirMembers->count()){            
            return redirect()->route('reservoir.index')->with('info_message', 'Cannot delete with members on it!⛔');

        }
        $reservoir->delete();
        return redirect()->route('reservoir.index')->with('success_message', 'Reservoir deleted!🌋');
    }
}
