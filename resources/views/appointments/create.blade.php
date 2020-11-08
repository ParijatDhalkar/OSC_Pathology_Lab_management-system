@extends('layouts.user')
@section('content')

<div class="container">
  <form method="post" action="/book_test">
    @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="pname">Patient Name</label>
            <input type="text" class="form-control" id="pname">
          </div>
          <div class="form-group col-md-6">
            <label for="age">Age</label>
            <input type="text" class="form-control" id="age">
          </div>
        </div>
        <div class="form-group">
          <label for="add">Address</label>
          <input type="text" class="form-control" id="add" placeholder="1234 Main St">
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">city</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
              <option selected>CBC</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Request Appointment</button>
  </form>
</div>
@endsection