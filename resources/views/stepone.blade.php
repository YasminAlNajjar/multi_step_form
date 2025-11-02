@extends('layout.default')
  
@section('content')

<div class="card">
  <div class="card-header">
            <h3>Step 1 of 2: Basic Information</h3>
   </div>
  <div class="card-body">
    <form method='POST' action="{{route('firststep.store')}}">
        @csrf
       
        <div class="form-group">
         <label>Name</label>
         <input type='text' name='name' class="form-control" value="{{ old('name', session('form_data.name')) }}" require>
         @error('name')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>


       <div class="form-group">
         <label>Age</label>
         <input type='number' name='age' value="{{ old('age', session('form_data.age')) }}" require>
         @error('age')
              <div class="text-danger">{{ $message }}</div>
          @enderror
       </div>        

       
       <div class="form-group">
         <label for="exampleInputEmail1" class="form-label">Email address</label>
         <input type="email" name ='email' class="form-control" value="{{ old('email', session('form_data.email')) }}" require>
         @error('email')
              <div class="text-danger">{{ $message }}</div>
          @enderror
       </div>


       <div class="form-check">
          
         <label>Gender</label>
         <div class="form-group">
           <input type="radio" name="gender" value="female" class="form-check-input" {{ (old('gender', session('form_data.gender')) == 'female') ? 'checked' : '' }}> 
           <label class="form-check-label"> Female</label>
        </div>
         
        <div class="form-group">
           <input type="radio" name="gender" value="male" class="form-check-input" {{ (old('gender', session('form_data.gender')) == 'male') ? 'checked' : '' }}> 
           <lable class="form-check-label"> Male</label>

       </div>
         @error('gender')
              <div class="text-danger">{{ $message }}</div>
          @enderror
       </div>


       <div class="form-group">
         <button type="submit" class="btn btn-success float-right">Next</button>
       </div>

    </form>
  </div>
</div>


@endsection