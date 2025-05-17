<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Department;
use App\Models\Subscription;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $subscriptions = Subscription::select('department_id')->where('user_id', $request->user()->id);
        return view('profile.edit', [
            'user' => $request->user(),
            'departments' => Department::whereIn('id', $subscriptions)->get(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email = strtolower($request->user()->email);
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

    /**
     * Subscribe user to all departments.
     */
    public function subscribeAll(Request $request): RedirectResponse
    {
        $userId = $request->user()->id;
        $subscriptions = Subscription::where('user_id', $userId)->get();
        Department::all()->each(
            function($item, $key) use($subscriptions, $userId) {
                if (!$subscriptions->contains('department_id', $item->id)) {
                    $data['user_id'] = $userId;
                    $data['department_id'] = $item->id;
                    Subscription::create($data);
                }
            }
        );

        return redirect()->back();
    }

    /**
     * Subscribe user to department.
     */
    public function subscribe(Request $request, string $id): RedirectResponse
    {
        $subscription = Subscription::where('user_id', $request->user()->id)->where('department_id', $id)->first();
        if (!$subscription)
        {
            $data['user_id'] = $request->user()->id;
            $data['department_id'] = $id;
            Subscription::create($data);
        }

        return redirect()->back();
    }

    /**
     * Unsubscribe user to department.
     */
    public function unsubscribe(Request $request, string $id): RedirectResponse
    {
        $subscription = Subscription::where('user_id', $request->user()->id)->where('department_id', $id)->first();
        $subscription->delete();

        return Redirect::route('profile.edit');
    }
}
