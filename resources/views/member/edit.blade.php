@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Edit Member info📝</h1></div>

               <div class="card-body">
                <form method="POST" action="{{route('member.update',[$member])}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="member_name"  class="form-control" value="{{old('member_name',$member->name)}}">

                        <small class="form-text text-muted">(3-200 letters)</small>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" name="member_surname"  class="form-control" value="{{old('member_surname',$member->surname)}}">
                        <small class="form-text text-muted">(3-200 letters)</small>
                    </div>
                    <div class="form-group">
                        <label>Live</label>
                        <input type="text" name="member_live"  class="form-control" value="{{old('member_live',$member->live)}}">
                        <small class="form-text text-muted">City</small>
                    </div>
                    <div class="form-group">
                        <label>Experience</label>
                        <input type="text" name="member_experience"  class="form-control" value="{{old('member_experience',$member->experience)}}">
                        <small class="form-text text-muted">Number in years(1,2,5,10 ect.)</small>
                    </div>
                    <div class="form-group">
                        <label>Registered</label>
                        <input type="text" name="member_registered"  class="form-control" value="{{old('member_registered',$member->registered)}}">
                        <small class="form-text text-muted">Number in years(1,2,5,10 ect.)</small>
                    </div>            
        
                    <div class="form-group"> 
                            <label>Select Reservoir</label>                  
                            <select class="form-select" name="reservoir_id">
                                @foreach ($reservoirs as $reservoir)
                                    <option value="{{$reservoir->id}}" @if($reservoir->id == $member->reservoir_id) selected @endif>{{$reservoir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">EDIT</button>
                </form>
                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection



