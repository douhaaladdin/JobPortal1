<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <x-bootstrap-css></x-bootstrap-css>
</head>

<body>
    <x-navbar />

    <h3 class="text-success text-center m-5"> {{ $student->Name }} Data</h3>

    {{-- @dd($student->track) --}}

    <table class="table table-striped w-75 m-auto border">
        <thead>
            <tr>
                {{-- <th scope="col">id</th> --}}
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Age</th>
                <th scope="col">Image</th>
                @if($student->track_id)
                <th scope="col">Student Track</th>
                @endif
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                {{-- <td>{{ $student->id}}</td> --}}
                <td>{{ $student->name}}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->age }}</td>

                <td><img src="{{ $student->image}}" alt="studentImage" srcset="" width="50px" height="50px"></td>
                @if($student->track_id)

                <td><a href="{{ route('tracks.show',$student->track_id) }}"
                        style="text-decoration: none; color:brown">{{ $student->track->name }} </a></td>

                @endif
                <td>
                    <a href="{{ route('students.index') }}"><button class="btn btn-warning">Back</button></a>
                    <a href="http://"><button class="btn btn-danger">Delete</button></a>

                </td>
            </tr>

        </tbody>
    </table>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
