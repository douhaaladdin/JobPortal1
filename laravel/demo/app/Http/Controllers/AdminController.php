<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class AdminController extends Controller
{
    public function index()
    {
        // Get all pending jobs
        $pendingJobs = Job::where('is_approved', false)->latest()->get();

        return view('admin.dashboard', compact('pendingJobs'));
    }

    public function approveJob(Job $job)
    {
        $job->is_approved = true;
        $job->save();

        return redirect()->route('admin.dashboard')->with('success', 'Job approved successfully!');
    }

    public function rejectJob(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Job rejected and deleted successfully!');
    }
}