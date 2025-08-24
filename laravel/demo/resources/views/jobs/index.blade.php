
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('components.navbar')

    <div class="container mt-4">
        <h1 class="text-center">Search for Jobs</h1>

        {{-- Search Form --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('jobs.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="Search by job title or keyword" value="{{ request('keyword') }}">
                        <select name="location" class="form-select">
                            <option value="">All Locations</option>
                            {{-- You would loop through your locations here --}}
                            {{-- @foreach($locations as $location)
                                <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>{{ $location }}</option>
                            @endforeach --}}
                        </select>
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            {{-- You would loop through your categories here --}}
                            {{-- @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach --}}
                        </select>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        {{-- Job Listings Section --}}
        <h2 class="mt-4">Available Jobs</h2>
        <div class="row">
            {{-- This is where you would loop through and display the jobs --}}
            {{-- @forelse($jobs as $job)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $job->company }} - {{ $job->location }}</h6>
                            <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                            <a href="{{ route('jobs.show', $job) }}" class="card-link">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No jobs found.</p>
                </div>
            @endforelse --}}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
