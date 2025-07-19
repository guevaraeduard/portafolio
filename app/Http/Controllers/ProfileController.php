<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\forgotPasswordNuxt;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
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

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function uploadFileSelectoresForm(Request $request)
    {
    
        $info = pathinfo($request->file('file')->getClientOriginalName());
        $image_path = $request->file('file');
        $file_name = 'file' . rand(1, 1000) . '.' . $info['extension'];
        $image_path_name = time() . $file_name;
        Storage::disk('images')->put($image_path_name, File::get($image_path));
        return response()->json([
            'image_url' => asset('storage/' . $image_path_name),
            'process' => true,
            'file_name' => $info['basename'],
        ]);
    }

    public function sendEmail(Request $request)
    {

        try {
            if ($request->type == 'forgot-password') {
                //$request->email
                Mail::to($request->email)->send(new forgotPasswordNuxt($request->token, $request->subject));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al enviar el email', 'error' => $e->getMessage()]);
        }


        return response()->json(['message' => 'Email enviado correctamente']);
    }
}
