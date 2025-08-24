<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Track</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="m-5">
        <h1 class="text-success w-75 m-auto">
            Create New Track
        </h1>
    </div>


    <form method="POST" action="{{ route('tracks.store') }}" class="w-75 m-auto border p-2">
        @csrf


        {{-- Handel track Name erro --}}
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- track Name --}}
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">track Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputName">
        </div>

        {{-- Handel track address erro --}}
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- track description --}}
        <div class="mb-3">
            <label for="exampleInputdescription" class="form-label">track description</label>
            <input name="description" type="text" class="form-control" id="exampleInputdescription">
        </div>


        {{-- Handel track image erro --}}
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- track Image --}}

        <div class="mb-3">
            <label for="exampleInputImage" class="form-label">track Image</label>
            <input name="image" type="text" class="form-control" id="exampleInputImage">
        </div>


        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        <x-button class="primary" name="Submit"></x-button>
    </form>




    <x-bootstrap-js></x-bootstrap-js>
</body>

</html>
