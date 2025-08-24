<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JobBoard</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        {{-- Include the correct navbar component from the components directory --}}
        @include('components.navbar')

        <div class="container text-center mt-5">
            <h1 class="display-4">Welcome to the Job Board!</h1>
            <p class="lead">
                Find the perfect job for you or post a job listing to find the right candidate.
            </p>
            <hr class="my-4">
            <p>
                Use the navigation bar above to explore jobs or manage your account.
            </p>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
