<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        $user = $request->user();

        // If the user has not verified their email, show the verification prompt
        if (! $user->hasVerifiedEmail()) {
            return view('auth.verify-email');
        }

        // If the user has verified their email but has not created an application, redirect them to the application creation page
        if ($user->applications()->doesntExist()) {
            return redirect()->route('applications.create');
        }

        // If the user's email is already verified, redirect them to the jobs index
        return redirect()->intended(route('jobs.index', absolute: false));
    }
}
