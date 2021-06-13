
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header">
                  <h1>Members List📃</h1>

                  <form action="{{route('member.index')}}" method="GET">
                    <fieldset class="sort">
                    
                    <legend>Sort by:</legend>                     
                      <button class="btn btn-info" for="_1" name="sort" value="name" id="_1">name a-z ↓</button>
                      <button class="btn btn-info" for="_2" name="sort" value="surname" id="_2">surname a-z ↓</button>
                      <a href="{{route('member.index')}}" class="btn btn-info">Reset</a> 
                    </fieldset>

                    <fieldset class="sort">
                    <legend>Filter by:</legend>
                    <div class="inputs">
                      <select class="form-select" name="reservoir_id">
                            <option value="0">Select Reservoir</option>
                                @foreach ($reservoirs as $reservoir)                                    
                                    <option value="{{$reservoir->id}}" @if($reservoir_id == $reservoir->id) selected @endif>{{$reservoir->title}}</option>
                                @endforeach
                      </select>
                      <button class="btn btn-info">Filter</button>
                    </div>
                    </fieldset>                  
                    
                  </form>
               </div> 
                   
               <div class="card-body">
               <ul class="list-group " >
                @foreach ($members as $member)
                <li class="list-group-item list-group-item-action">
                <div class="list-bin">
                  <div class="list-title">
                    <span>{{$member->name}} {{$member->surname}}</span>
                   {{$member->memberReservoir->title}} 
                  </div>
                  <div class="list-buttons">
                    <a class="btn btn-outline-success" href="{{route('member.show',[$member])}}">SHOW</a>
                    <a class="btn btn-outline-danger" href="{{route('member.edit',[$member])}}">EDIT</a>
                    <form method="POST" action="{{route('member.destroy', [$member])}}">
                    @csrf
                    <button class="btn btn-outline-dark" type="submit">DELETE</button>
                    </form>
                  </div>
                  </div>
                  </li>
                @endforeach

                 </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection










