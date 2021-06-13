@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Reservoir info</h1></div>
               <div class="card-body">

                    <ul class="list-group">
                        
                        <li class="list-group-item">Title: {{$reservoir->title}}</li>
                        <li class="list-group-item">Area: {{$reservoir->area}}</li>
                        <li class="list-group-item">About: {!!$reservoir->about!!}</li>
                        
                    </ul>        
                   <div class="show-buttons">
                        <a href="{{route('reservoir.index')}}" class="btn btn-outline-success">GO BACK</a>
                    </div>
                 </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection



