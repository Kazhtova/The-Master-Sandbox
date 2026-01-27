<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Log;  
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user();

        return view('profile.index', ['users' => $profile]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
    }

    public function edit(User $profile)
    {
        
        $profile = Auth::user();
        return view('profile.edit', ['users' => $profile]);
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $profile */
        $profile = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($profile->id)],
            'password' => 'nullable|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $profile->nama = $request->nama;
        $profile->email = $request->email;

        if($request->filled('password')){
            $profile->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')){
            $avatarUrl = $this->uploadToSupabase($request->file('avatar'), $profile->id);

            if($avatarUrl) {
                $profile->avatar_url = $avatarUrl; 
            } else {
                return back()->with('error', 'Gagal mengupload gambar ke server.');
            }
        }

        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Berhasil Update Data Profile User');
        
    }

    public function destroy(string $id)
    {
    }
    private function uploadToSupabase($file, $userId)
    {
        
        $fileName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $path = "{$userId}/{$fileName}";
        $cfg = config('services.supabase'); 

        try {
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::withToken($cfg['key'])
                ->withHeaders(['apikey' => $cfg['key']])
                ->withBody(file_get_contents($file), $file->getMimeType())
                ->post("{$cfg['url']}/storage/v1/object/{$cfg['bucket']}/{$path}");

            if (! $response->successful()) {
                throw new \Exception("Gagal Upload ke Supabase: " . $response->body());
            }

            return "{$cfg['url']}/storage/v1/object/public/{$cfg['bucket']}/{$path}";
        } catch (\Exception $e) {
            Log::error("Supabase Upload Error: " . $e->getMessage());
            return null;
        }
    }
}
