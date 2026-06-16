<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['job'])->latest()->get(); // Assuming you have an Application model to fetch applications

        return view('applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        // Validate and store the application
        $validated = $request->validate([
            'job_id' => 'required|exists:job_board,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Application::create([
            'user_id' => auth()->id(),
            'job_id' => $validated['job_id'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'degree' => $validated['degree'],
            'university' => $validated['university'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('jobs.show', $validated['job_id']);
    }

    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        // Validate and update the application
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $application->update($validated);

        return redirect()->route('applications.index');
    }

    public function destroy(Application $application)
    {
        // Delete the application
        $application->delete();

        return redirect()->route('applications.index');
    }
}
