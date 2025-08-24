@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $job->title }}</h1>
    <p><strong>Company:</strong> {{ $job->company_name }}</p>
    <p><strong>Location:</strong> {{ $job->location }}</p>
    <p><strong>Work Type:</strong> {{ $job->work_type }}</p>
    <p><strong>Salary:</strong> {{ $job->salary_range ?? 'Not specified' }}</p>
    <p><strong>Description:</strong> {{ $job->description }}</p>
    <p><strong>Responsibilities:</strong> {{ $job->responsibilities }}</p>
    <p><strong>Skills:</strong> {{ $job->required_skills }}</p>
    <p><strong>Deadline:</strong> {{ $job->deadline }}</p>
</div>
@endsection
