<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobSearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::where('is_approved', true);

        // Filter by keywords
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->input('location')}%");
        }

        // Filter by work type
        if ($request->filled('work_type')) {
            $query->where('work_type', $request->input('work_type'));
        }

        // Filter by salary range
        if ($request->filled('salary_range')) {
            $query->where('salary_range', $request->input('salary_range'));
        }

        // Filter by date posted
        if ($request->filled('date_posted')) {
            $date = now()->subDays($request->input('date_posted'));
            $query->where('created_at', '>=', $date);
        }

        $jobs = $query->latest()->paginate(10); // Display 10 jobs per page

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        // Make sure the job is approved before showing it
        if (!$job->is_approved) {
            abort(404);
        }

        return view('jobs.show', compact('job'));
    }
}