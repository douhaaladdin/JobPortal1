@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Post a New Job</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Responsibilities</label>
            <textarea name="responsibilities" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Required Skills</label>
            <input type="text" name="required_skills" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salary Range</label>
            <input type="text" name="salary_range" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Benefits</label>
            <textarea name="benefits" class="form-control" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Work Type</label>
            <select name="work_type" class="form-control" required>
                <option value="remote">Remote</option>
                <option value="onsite">On-site</option>
                <option value="hybrid">Hybrid</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Company Logo</label>
            <input type="file" name="company_logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Post Job</button>
    </form>
</div>
@endsection
