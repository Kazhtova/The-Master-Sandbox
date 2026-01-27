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
        // 1. Cek Config
        $url = config('services.supabase.url');
        $key = config('services.supabase.key');
        $bucket = config('services.supabase.bucket');

        // 2. Kirim ke Supabase
        $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $path = $userId . '/' . $fileName;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $key,
            'apikey'        => $key,
            'Content-Type'  => $file->getMimeType(),
        ])->withBody(
            file_get_contents($file->getRealPath()), $file->getMimeType()
        )->post($url . '/storage/v1/object/' . $bucket . '/' . $path);

        // 3. JEBAKAN ERROR (Wajib ada untuk diagnosa)
        if (!$response->successful()) {
            dd([
                'STATUS' => 'GAGAL UPLOAD KE SUPABASE',
                'KODE_HTTP' => $response->status(),
                'PESAN_ERROR_ASLI' => $response->json(), // <--- Ini kuncinya
                'URL_TUJUAN' => $url . '/storage/v1/object/' . $bucket . '/' . $path,
                'BUCKET_CONFIG' => $bucket
            ]);
        }

        return $url . '/storage/v1/object/public/' . $bucket . '/' . $path;
    }
}
