@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-10">
           <div class="card">
               <div class="card-header"><h1>Edit Reservoir✍</h1></div>

               <div class="card-body">
                  <form method="POST" action="{{route('reservoir.update',$reservoir)}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title',$reservoir->title)}}">
                        <small class="form-text text-muted">Name of lakes/rivers/seas</small>
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <input type="text" class="form-control" type="text" name="reservoir_area" value="{{old('reservoir_area',$reservoir->area)}}">
                        <small class="form-text text-muted">Size square kilometers</small>
                    </div>
                    <div class="form-group">
                        <label>About</label>
                        <textarea id="summernote" type="text"  name="reservoir_about">{!!old('reservoir_about',$reservoir->about)!!}</textarea>
                        <small class="form-text text-muted">Comments about reservoir</small>
                    </div>                    
                    
                     
                     @csrf
                     <button class="btn btn-outline-danger" type="submit">EDIT</button>
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









