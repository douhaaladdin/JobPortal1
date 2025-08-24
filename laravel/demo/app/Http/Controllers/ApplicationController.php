<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job)
    {
        // Check if the user is a candidate
        if (auth()->user()->role !== 'candidate') {
            return back()->with('error', 'Only candidates can apply for jobs.');
        }

        // Check if the candidate has already applied for this job
        if (auth()->user()->applications()->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'You have already applied for this job.');
        }

        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        // Send a notification to the employer (bonus feature)
        // We'll implement this later

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully!');
    }
}