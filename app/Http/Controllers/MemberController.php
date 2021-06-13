<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Reservoir;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservoirs = Reservoir::all();
        
        if($request->reservoir_id) {
            $members = Member::where('reservoir_id',$request->reservoir_id)->get();  
            $reservoir_id = $request->reservoir_id;
        }
        else {
            $members = Member::all();      
            $reservoir_id = 0;      
        }


        if($request->sort){
            // if ('reservoir' == $request->sort) {
            //     $members = $members->sortBy('reservoir');
            // }
            if ('name' == $request->sort) {
                $members = $members->sortBy('name');
            }
            elseif ('surname' == $request->sort) {
                $members = $members->sortBy('surname');
            }
        }

        return view('member.index', ['members' => $members, 'reservoirs' => $reservoirs, 'reservoir_id'=>$reservoir_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reservoirs = Reservoir::all();
        return view('member.create', ['reservoirs' => $reservoirs]);
 
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
            'member_name' => ['required', 'min:3', 'max:150'],
            'member_surname' => ['required', 'min:3', 'max:100'],
            'member_live' => ['required','min:3', 'max:200'],
            'member_experience' => ['required', 'integer'],
            'member_registered' => ['required', 'integer'],
            'reservoir_id'=>['required', 'integer', 'min:1']

        ],
        [
            'reservoir_id.min'=>'Please, select Reservoir'
        ],
        [
            'member_experience.integer'=>'Experience must be number.',
            'member_registered.integer'=>'Registered must be number.'
        ]
        
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }




        $member = new Member;
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;
        $member->save();        
        return redirect()->route('member.index')->with('success_message', 'Member successfully created!✅');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('member.show', ['member' =>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $reservoirs = Reservoir::all();
       return view('member.edit', ['member' => $member, 'reservoirs' => $reservoirs]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    { 
        $validator = Validator::make($request->all(),
        [
            'member_name' => ['required', 'min:3', 'max:150'],
            'member_surname' => ['required', 'min:3', 'max:100'],
            'member_live' => ['required','min:3', 'max:200'],
            'member_experience' => ['required', 'integer'],
            'member_registered' => ['required','integer'],
            'reservoir_id'=>['required', 'integer', 'min:1']

        ],
        [
            'member_experience.integer'=>'Experience must be number.',
            'member_registered.integer'=>'Registered must be number.',
            'reservoir_id.min'=>'Please, select Reservoir'
        ]
        
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        
      
        $member->name = $request->member_name;
        $member->surname = $request->member_surname;
        $member->live = $request->member_live;
        $member->experience = $request->member_experience;
        $member->registered = $request->member_registered;
        $member->reservoir_id = $request->reservoir_id;
        $member->save();
        return redirect()->route('member.index')->with('success_message', 'Member edited!✅');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success_message', 'Member deleted❗');
 
    }
}
