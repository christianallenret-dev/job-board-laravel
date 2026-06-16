<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get(); // Assuming you have a Job model to fetch job postings

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load('applications.user'); // Load applications related to the job

        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Validate and store the job posting
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'type' => 'required',
            'company' => 'required|string|max:255',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.index');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Validate and update the job posting
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.index');
    }

    public function destroy(Job $job)
    {
        // Delete the job posting
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
