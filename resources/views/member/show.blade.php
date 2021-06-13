@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Member info</h1></div>
               <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item">Reservoir: {{$member->memberReservoir->title}}</li>
                        <li class="list-group-item">Name: {{$member->name}}</li>
                        <li class="list-group-item">Surname: {{$member->surname}}</li>
                        <li class="list-group-item">Live: {{$member->live}}</li>
                        <li class="list-group-item">Experience: {{$member->experience}}</li>
                        <li class="list-group-item">Registered: {{$member->registered}}</li>
                    </ul>        
                   <div class="show-buttons">
                        <a href="{{route('member.index')}}" class="btn btn-outline-success">GO BACK</a>
                    </div>
                 </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection



