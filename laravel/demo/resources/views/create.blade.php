<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Student</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="m-5">
        <h1 class="text-success w-75 m-auto">
            Create New Student
        </h1>
    </div>

    {{-- handel erros --}}
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}



    {{-- create student form data --}}

    <form method="POST" action="{{ route('students.store') }}" class="w-75 m-auto border p-2">
        @csrf


        {{-- Handel Student Name erro --}}
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- Student Name --}}
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Student Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputName">
        </div>
        {{-- Handel Student email erro --}}
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- Student email --}}
        <div class="mb-3">
            <label for="exampleInputemail" class="form-label">Student email</label>
            <input name="email" type="email" class="form-control" id="exampleInputemail">
        </div>
        {{-- Handel Student address erro --}}
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- Student Address --}}
        <div class="mb-3">
            <label for="exampleInputAddress" class="form-label">Student Address</label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress">
        </div>
        {{-- Handel Student phone erro --}}
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- Student phone --}}
        <div class="mb-3">
            <label for="exampleInputphone" class="form-label">Student phone</label>
            <input name="phone" type="text" class="form-control" id="exampleInputphone">
        </div>
        {{-- Handel Student age erro --}}
        @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- Student age --}}
        <div class="mb-3">
            <label for="exampleInputage" class="form-label">Student age</label>
            <input name="age" type="numder" class="form-control" id="exampleInputage">
        </div>

        {{-- Handel Student image erro --}}
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- Student Image --}}

        <div class="mb-3">
            <label for="exampleInputImage" class="form-label">Student Image</label>
            <input name="image" type="text" class="form-control" id="exampleInputImage">
        </div>

        {{-- Handel Student gender erro --}}
        @error('gender')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- student gender --}}
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
            <label class="form-check-label" for="gender">
                male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
            <label class="form-check-label" for="gender">
                female
            </label>
        </div>



 {{-- show all tracks ==> choose student track --}}
{{-- @dd($tracks) --}}
{{-- @if(count($tracks>0)) --}}
<div class="m-3 d-flex justify-content-around">
    <label for="trak_student" class="form-label">Choose  Track</label>
     <select id="trak_student" class="form-select " aria-label="Default select example" name="track_id" >
@foreach ($tracks as $track )
{{-- @dd($track) --}}
  <option  value="{{$track->id}}">{{$track->name}}</option>
@endforeach


</select>

</div>
{{-- @endif --}}
    {{-- @dd($tracks) --}}
        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        <x-button class="primary" name="Submit"></x-button>
    </form>




    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>
