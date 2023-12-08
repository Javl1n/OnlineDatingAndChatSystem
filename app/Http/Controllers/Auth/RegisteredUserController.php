<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Closure;
use Illuminate\Validation\Rules\File;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'tags' => Tag::all(),
        ]);
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'age' => [
                'required', 
                'integer', 
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value < 18) {
                        $fail("You must be at least 18 years old");
                    }
                }
            ],
            'profile' => ['required', File::image()],
            'validation' => ['required', File::image()],
            'likes' => [
                function (string $attribute, mixed $value, Closure $fail) {
                    if (count($value) < 3) {
                        $fail("Please select at least 3");
                    }
                }
            ]
        ]);

        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'bio' => $request->bio,
            'password' => Hash::make($request->password),
        ]);

        $user->profile()->create([
            'mime_type' => $request->profile->getClientOriginalExtension(),
            'url' => $request->profile->store('avatar'),
        ]);

        $user->verification()->create()->media()->create([
            'mime_type' => $request->validation->getClientOriginalExtension(),
            'url' => $request->validation->store('verification'),
        ]);

        foreach ($request->likes as $tag)
        {
            $user->tags()->attach($tag);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
