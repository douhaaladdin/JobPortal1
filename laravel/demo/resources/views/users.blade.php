<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h3 class="text-success text-center">All Users Page</h3>
{{-- @dump($users) --}}
{{-- @dd($users) --}}

{{-- array:3 [▼ // resources\views/users.blade.php
  0 => array:3 [▶]
  1 => array:3 [▶]
  2 => array:3 [▶]
] --}}


<table class="table table-striped w-75 m-auto border">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Group</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
@foreach ($users as $user )
<tr>
    <td>{{ $user['id'] }}</td>
    <td>{{ $user['name'] }}</td>
    <td>{{ $user['group'] }}</td>
    {{-- @dump($user) --}}
    <td>
        <button class="btn btn-warning">Show</button>
        <button class="btn btn-primary">Edit</button>
        <button class="btn btn-danger">Delete</button>
    </td>
</tr>
@endforeach
  </tbody>
</table>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
