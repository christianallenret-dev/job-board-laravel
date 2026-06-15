<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('created_at', 'desc')->get(); // Assuming you have an Application model to fetch applications

        return view('application.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('application.show', compact('application'));
    }

    public function create()
    {
        return view('application.create');
    }

    public function store(Request $request)
    {
        // Validate and store the application
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
        ]);

        Application::create($validated);

        return redirect()->route('application.index');
    }

    public function edit(Application $application)
    {
        return view('application.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        // Validate and update the application
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $application->update($validated);

        return redirect()->route('application.index');
    }

    public function destroy(Application $application)
    {
        // Delete the application
        $application->delete();

        return redirect()->route('application.index');
    }
}
