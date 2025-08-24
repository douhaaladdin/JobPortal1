<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>track </title>
    <x-bootstrap-css></x-bootstrap-css>
</head>

<body>
    <x-navbar />

    <h3 class="text-success text-center m-5"> {{ $track->name }} Data</h3>

    {{-- @dd($track->students) --}}

    <table class="table table-striped w-75 m-auto border">
        <thead>
            <tr>
                {{-- <th scope="col">id</th> --}}
                <th scope="col">Name</th>

                <th scope="col">Description</th>

                <th scope="col">Image</th>

                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $track->name}}</td>

                <td>{{ $track->description }}</td>

                <td><img src="{{ $track->image}}" alt="trackImage" srcset="" width="50px" height="50px"></td>

                <td>
                    <a href="{{ route('tracks.index') }}"><button class="btn btn-warning">Back</button></a>
                    <a href="http://"><button class="btn btn-danger">Delete</button></a>

                </td>
            </tr>

        </tbody>
    </table>

{{-- @dd($track->students) --}}
<div class="m-5">
    <h2 class="text-success">Track Students</h2>
    @if($track->students)
  <table class="table table-striped w-75 m-auto border">
        <thead>
            <tr>
                {{-- <th scope="col">id</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Image</th>


            </tr>
        </thead>
        <tbody>

          @foreach ($track->students as  $student)
     <tr>
                {{-- <td>{{ $student->id}}</td> --}}
                <td><a href="{{ route('students.view',$student->id) }}" style="text-decoration: none; color:rgb(10, 163, 66)">{{ $student->name}}</a></td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>

                <td><img src="{{ $student->image}}" alt="studentImage" srcset="" width="50px" height="50px"></td>

            </tr>
          @endforeach


        </tbody>
    </table>


@endif

</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
