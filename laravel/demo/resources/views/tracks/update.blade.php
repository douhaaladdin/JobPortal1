<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create track</title>
<x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar/>

<div class="m-5">
    <h1 class="text-success w-75 m-auto">
   Update {{   $track->name  }}  Data
</h1>
</div>

<form method="POST" action="{{ route('tracks.update',$track->id) }}" class="w-75 m-auto border p-2">
  @csrf
  @method('put')
    {{-- track Name --}}
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">track Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputName" value="{{ $track->name }}">
  </div>

  {{-- track desctiption --}}
    <div class="mb-3">
    <label for="exampleInputdesctiption" class="form-label">track desctiption</label>
    <input name="desctiption" type="text" class="form-control" id="exampleInputdesctiption" value="{{ $track->desctiption }}" >
  </div>


    {{-- track Image --}}

    <div class="mb-3">
    <label for="exampleInputImage" class="form-label">track Image</label>
    <input name="image" type="text" class="form-control" id="exampleInputImage" value="{{ $track->image }}"  >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>




<x-bootstrap-js></x-bootstrap-js>
</body>
</html>
