<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Reservation;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function showReservations()
    {
        $user = auth()->user();
        $reservations = $user->reservations()->with('event', 'tickets')->get();

        // Sort reservations by date
        $sortedReservations = $reservations->sortBy(function ($reservation) {
            if ($reservation->event->date->isToday() && $reservation->tickets->isNotEmpty()) {
                return 0; // Today's reservations with tickets scanned
            } elseif ($reservation->event->date > now()) {
                return 1; // Future reservations
            } else {
                return 2; // Historical reservations (expired or with tickets not scanned)
            }
        });

        return view('reservations', compact('sortedReservations'));
    }
}
