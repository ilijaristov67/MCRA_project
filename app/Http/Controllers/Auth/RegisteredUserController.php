<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Rinvex\Country\CountryLoader;
use Illuminate\Support\Collection;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {


        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'biography' => ['nullable', 'min:150'],
            'number' => ['nullable'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'cv' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'title' => ['nullable', 'string', 'max:255'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($request->filled('biography')) {
            $user->biography = $request->biography;
            $user->save();
        }
        if ($request->filled('city')) {
            $user->city = $request->city;
            $user->save();
        }
        if ($request->filled('country')) {
            $user->country = $request->country;
            $user->save();
        }
        if ($request->filled('title')) {
            $user->title = $request->title;
            $user->save();
        }
        if ($request->filled('number')) {
            $user->number = $request->number;
            $user->save();
        }
        if (request()->hasFile('cv')) {

            $cvPath = request()->file('cv')->move(public_path('cvs/' . $user->id), 'cv.pdf');
            $user->cv_path = 'cvs/' . $user->id . '/cv.pdf';
            $user->save();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();

            $imagePath = request()->file('image')->move(public_path('images/' . $user->id), $imageName);
            $user->img_path = 'images/' . $user->id . '/' . $imageName;
            $user->save();
        } else {
            $user->img_path = 'standardImage/' . 'images.png';
            $user->save();
        }


        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }
}
