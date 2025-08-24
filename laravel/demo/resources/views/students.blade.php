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

            {{-- <a href="{{ route('students.create') }}"><button class="btn btn-success">Create Student</button></a> --}}
            <a href="{{ route('students.create') }}">  <x-button class="success" name="Create Student"></x-button>
</a>

</div>


<table class="table table-striped w-75 m-auto border">
  <thead>
    <tr>
      {{-- <th scope="col">id</th> --}}
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($students as $student )
<tr>
    {{-- <td>{{ $student->id}}</td> --}}
    <td>{{ $student->name}}</td>
    <td>{{ $student->address }}</td>
    <td><img src="{{ $student->image}}" alt="studentImage" srcset="" width="50px" height="50px"></td>
    <td>
        <a href="{{ route('students.view',$student->id) }}">  <x-button class="warning" name="Show"></x-button>
</a>
       <a href="{{ route('students.update',$student->id) }}">   <x-button class="primary" name="Edit"></x-button>
</a>
        {{-- <a href="{{ route('students.destroy',$student->id) }}"></a> --}}

        <form action="{{ route('students.destroy',$student->id) }}" method="post">
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
<div class="mt-5 d-flex justify-center align-items-center ">
    {{ $students->links() }}
</div>






<x-bootstrap-js></x-bootstrap-js>
</body>
</html>
