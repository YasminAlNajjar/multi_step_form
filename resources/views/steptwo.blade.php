@extends('layout.default')
  
@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Step2</h3>
        </div>
    <div class="card-body">

     <form method='POST' action="{{route('secondstep.store')}}">
        @csrf

        <div class="form-group">
         <label>Universty</label>
         <input type='text' name='university' class="form-control" value="{{ old('university', session('form_data.university')) }}" require>
         @error('university')
              <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

       
       <div class="form-group">
         <label>College</label>
         <select class="form-select" name='college' aria-label="College" require>
            <option value='it' {{ old('college', session('form_data.college')) == 'it' ? 'selected' : '' }}>
                IT</option>

            <option value='science' {{ old('college', session('form_data.college')) == 'science' ? 'selected' : '' }}>
                Science </option>

            <option value='medicin' {{ old('college', session('form_data.college')) == 'medicin' ? 'selected' : '' }}>
                Medicin</option>

            <option value='low' {{ old('college', session('form_data.college')) == 'low' ? 'selected' : '' }}>
                Law</option>

            <option value='arts' {{ old('college', session('form_data.college')) == 'arts' ? 'selected' : '' }}>
                Arts</option>

            <option value='economics' {{ old('college', session('form_data.college')) == 'economics' ? 'selected' : '' }}>
                Economics</option>

            <option value='engineering' {{ old('college', session('form_data.college')) == 'engineering' ? 'selected' : '' }}>
                Engineering</option>
         </select>

         @error('college')
              <div class="text-danger">{{ $message }}</div>
          @enderror
       </div>

       
       <div class="form-group">
         <label>Major</label>
         <input type='text' name='major' class="form-control" value="{{ old('major', session('form_data.major')) }}" require>

         @error('major')
              <div class="text-danger">{{ $message }}</div>
          @enderror
       </div>

       <div class="form-group">
         <button type="submit" class="btn btn-success float-right">Submit</button>
            @csrf
            <a href="{{ route('firststep.show') }}" class="btn btn-secondary">Previous</a>
       </div>
  </form>
 </div>
</div>
@endsection
