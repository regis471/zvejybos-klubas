@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>New Reservoir🌊</h1></div>

               <div class="card-body" >
               
                  <form method="POST" action="{{route('reservoir.store')}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="reservoir_title"  class="form-control" value="{{old('reservoir_title')}}">
                        <small class="form-text text-muted">Name of lakes/rivers/seas</small>
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <input type="text" name="reservoir_area"  class="form-control" value="{{old('reservoir_area')}}">
                        <small class="form-text text-muted">Size of area (square kilometers)</small>
                    </div>
                    <div class="form-group">
                        <label>About</label>
                        <textarea  type="text" name="reservoir_about"  id="summernote">{!!old('reservoir_about')!!}</textarea>
                        <small class="form-text text-muted">Comments on area</small>
                    </div>                     
                     
                     
                     @csrf
                     <button class="btn btn-outline-success" type="submit">ADD</button>
                  </form>
                 
               </div>
           </div>
       </div>
   </div>
</div>
<script>
$(document).ready(function() {
   $('#summernote').summernote();
 });
</script>
@endsection



