<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the job listings.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Start a new query on the Job model
        $query = Job::query();

        // Check if there is a keyword in the request and filter by it
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
        }

        // Check if there is a location in the request and filter by it
        if ($request->filled('location')) {
            $location = $request->input('location');
            $query->where('location', $location);
        }

        // Check if there is a category in the request and filter by it
        if ($request->filled('category')) {
            $category = $request->input('category');
            $query->where('category', $category);
        }

        // Get the filtered jobs and paginate them
        $jobs = $query->paginate(10);

        // Get unique locations and categories for the search filters
        $locations = Job::distinct()->pluck('location');
        $categories = Job::distinct()->pluck('category');

        // Pass the data to the view
        return view('jobs.index', compact('jobs', 'locations', 'categories'));
    }

    /**
     * Show the form for creating a new job listing.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // This is where you would return the create job form view
        return view('jobs.create');
    }

    /**
     * Store a newly created job listing in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // This is where you would validate and save a new job
        // Example:
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'location' => 'required',
        //     'category' => 'required',
        // ]);
        // Job::create($request->all());
        // return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified job listing.
     *
     * @param \App\Models\Job $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        // This is where you would return the single job view
        return view('jobs.show', compact('job'));
    }
}
