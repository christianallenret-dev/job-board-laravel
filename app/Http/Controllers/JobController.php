<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Application;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get(); // Assuming you have a Job model to fetch job postings

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load([
            'applications' => function ($query) {
                $query->latest();
            },
            'applications.user'
        ]); // Load applications related to the job

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

    public function apply(Job $job)
    {
        $user = Auth::user();

        // Prevent admin from applying
        if ($user->isAdmin()) {
            return back()->with('error', 'Admins cannot apply for jobs.');
        }

        // Prevent duplicate applications (faster + cleaner)
        $exists = $job->applications()
            ->where('user_id', $user->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'You already applied for this job.');
        }

        $nameParts = explode(' ', $user->name, 2);

        Application::create([
            'user_id' => $user->id,
            'job_id' => $job->id,

            'first_name' => $nameParts[0],
            'last_name' => $nameParts[1] ?? '',

            'email' => $user->email,
            'degree' => 'Not Provided',
            'university' => 'Not Provided',
            'description' => 'Application submitted via job portal',
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function destroy(Job $job)
    {
        // Delete the job posting
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
