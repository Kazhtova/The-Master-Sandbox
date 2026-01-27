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
        //
        $profile = Auth::user();

        return view('profile.index', ['users' => $profile]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(User $profile)
    {
        
        $profile = Auth::user();
        return view('profile.edit', ['users' => $profile]);
    }

    public function update(Request $request)
    {
        //
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
    /**
     * Fungsi Helper Private untuk menangani upload ke Supabase
     */
    private function uploadToSupabase($file, $userId)
    {
        try {
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $path = $userId . '/' . $fileName;

            // --- PERBAIKAN: GUNAKAN CONFIG, JANGAN ENV ---
            // Pastikan Anda sudah setting config/services.php sesuai panduan sebelumnya
            
            $supabaseUrl = config('services.supabase.url');
            $supabaseKey = config('services.supabase.key');
            $supabaseBucket = config('services.supabase.bucket');

            // Cek apakah config terbaca (Debugging)
            if (!$supabaseUrl || !$supabaseKey || !$supabaseBucket) {
                Log::error('Supabase Config Missing. Cek config/services.php dan .env');
                return null;
            }

            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $supabaseKey,
                'apikey'        => $supabaseKey,
                'Content-Type'  => $file->getMimeType(),
            ])->withBody(
                file_get_contents($file->getRealPath()), $file->getMimeType()
            )->post($supabaseUrl . '/storage/v1/object/' . $supabaseBucket . '/' . $path);

            if ($response->successful()) {
                return $supabaseUrl . '/storage/v1/object/public/' . $supabaseBucket . '/' . $path;
            }

            // Jika gagal, catat error spesifik dari Supabase
            Log::error('Supabase API Error: ' . $response->body());
            return null;

        } catch (\Exception $e) {
            Log::error('System Error: ' . $e->getMessage());
            return null;
        }
    }
}
