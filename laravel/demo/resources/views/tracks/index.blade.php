<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>students</title>

<x-bootstrap-css></x-bootstrap-css>
</head>
<body>
    <x-navbar/>

<div class="m-5 d-flex justify-content-around">
    <h3 class="text-success text-center ">All Students Page</h3>

            {{-- <a href="{{ route('tracks.create') }}"><button class="btn btn-success">Create track</button></a> --}}
            <a href="{{ route('tracks.create') }}">  <x-button class="success" name="Create track"></x-button>
</a>

</div>


<table class="table table-striped w-75 m-auto border">
  <thead>
    <tr>
      {{-- <th scope="col">id</th> --}}
      <th scope="col">Name</th>
      <th scope="col">description</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($tracks as $track )
<tr>
    {{-- <td>{{ $track->id}}</td> --}}
    <td>{{ $track->name}}</td>
    <td>{{ $track->description }}</td>
    <td><img src="{{ $track->image}}" alt="trackImage" srcset="" width="50px" height="50px"></td>
    <td>
        <a href="{{ route('tracks.show',$track->id) }}">  <x-button class="warning" name="Show"></x-button>
</a>
       <a href="{{ route('tracks.update',$track->id) }}">   <x-button class="primary" name="Edit"></x-button>
</a>
        {{-- <a href="{{ route('tracks.destroy',$track->id) }}"></a> --}}

        <form action="{{ route('tracks.destroy',$track->id) }}" method="post">
            @method('DELETE')
            @csrf
            {{-- generate input:hidden ==> acess data --}}
            {{-- <button class="btn btn-danger">Delete</button> --}}
              <x-button class="danger" name="Delete"></x-button>

        </form>
    </td>
</tr>

@endforeach
  </tbody>

</table>

{{-- show all students in this track --}}




<div class="mt-5 d-flex justify-center align-items-center ">
    {{ $tracks->links() }}
</div>






<x-bootstrap-js></x-bootstrap-js>
</body>
</html>
