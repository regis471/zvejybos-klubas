@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Add New Member🎣</h1></div>

               <div class="card-body">
                    <form method="POST" action="{{route('member.store')}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="member_name"  class="form-control" value="{{old('member_name')}}">
                            <small class="form-text text-muted">(3-100 letters)</small>
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="member_surname"  class="form-control" value="{{old('member_surname')}}">
                            <small class="form-text text-muted">(3-150 letters)</small>
                        </div>
                        <div class="form-group">
                            <label>Live</label>
                            <input type="text" name="member_live"  class="form-control" value="{{old('member_live')}}">
                            <small class="form-text text-muted">City </small>
                        </div>
                        <div class="form-group">
                            <label>Experience</label>
                            <input type="text" name="member_experience"  class="form-control" value="{{old('member_experience')}}">
                            <small class="form-text text-muted">Write number (1/2/5/10 ect.) </small>
                        </div>
                        <div class="form-group">
                            <label>Registered since</label>
                            <input type="text" name="member_registered"  class="form-control" value="{{old('member_registered')}}">
                            <small class="form-text text-muted">Write number (1/2/5/10 ect.) </small>
                        </div>                       
                                              
                        <div class="form-group"> 
                            <label>Select Reservoir</label>                  
                            <select class="form-select" name="reservoir_id">
                            <option value="0">Select Reservoir</option>
                                @foreach ($reservoirs as $reservoir)
                                    {{-- <option value="{{$reservoir->id}}">{{$reservoir->title}} </option> --}}
                                    <option value="{{$reservoir->id}}" @if($reservoir->id == old('reservoir_id', 0)) selected @endif>{{$reservoir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @csrf
                    <button class="btn btn-outline-success" type="submit">ADD</button>
                    </form>
                 
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
















