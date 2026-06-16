<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // If already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(
                route('jobs.index', absolute: false) . '?verified=1'
            );
        }

        // Mark email as verified
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Decide next step based on application existence
        if ($user->applications()->doesntExist()) {
            return redirect()
                ->route('applications.create')
                ->with('success', 'Your email has been verified. Please create your application.');
        }

        return redirect()
            ->route('jobs.index')
            ->with('success', 'Your email has been verified.');
    }
}
