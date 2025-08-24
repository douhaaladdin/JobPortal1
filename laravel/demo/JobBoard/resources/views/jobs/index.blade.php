@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Available Jobs</h1>

    @forelse($jobs as $job)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $job->title }}</h4>
                <p><strong>Company:</strong> {{ $job->company_name }}</p>
                <p><strong>Location:</strong> {{ $job->location }}</p>
                <p>{{ Str::limit($job->description, 150) }}</p>
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">View Job</a>
            </div>
        </div>
    @empty
        <p>No jobs available right now.</p>
    @endforelse

    <div class="mt-3">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
