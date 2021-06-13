
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Reservoir List📃</h1></div>

               <div class="card-body">
               <ul class="list-group l">

                @foreach ($reservoirs as $reservoir)
                <li class="list-group-item list-group-item-action ">
                <div class="list-bin">

                    <div class="list-title">
                        <label>{{$reservoir->title}} <br>            
                        <small>Area: {{$reservoir->area}}</small>
                        
                        </label>
                    </div>
                    <div class="list-buttons">
                        <a href="{{route('reservoir.show',$reservoir)}}" class="btn btn-outline-success">Show</a>                  
                        <a href="{{route('reservoir.edit',$reservoir)}}" class="btn btn-outline-danger">Edit</a>                  
                        <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}">
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














