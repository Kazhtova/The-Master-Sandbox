<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Mentor;
use App\Models\Siswa;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        //
        $data = Buku::with(['mentor', 'siswa'])->when($request->search, function ($query, $search) {
            $query->where('judul_buku', 'like', "%{$search}%")->orWhere('penulis', 'like', "%{$search}%");
        })->paginate(5);;


        return view('buku.index', ['data' => $data]);
    }

    public function create()
    {
        //
        $mentors = Mentor::all();
        $siswa = Siswa::all();
        return view('buku.create', ['mentors' => $mentors, 'siswa' => $siswa]);
    }

    public function store(Request $request)
{
    // 1. Validasi
    $validated = $request->validate([
        'judul_buku'    => 'required|string|min:4',
        'penulis'       => 'required|string', 
        'tanggal_rilis' => 'required|date',
    ]);

    [$tipe, $id] = explode('-', $request->penulis);

    $user = ($tipe == 'siswa') ? Siswa::find($id) : Mentor::find($id);

    Buku::create(array_merge($validated, [
        'penulis'    => $user?->nama ?? 'Data Tidak Ditemukan',
        "{$tipe}_id" => $id 
    ]));

    return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Dibuat');
}
    public function show(Buku $buku)
    {
       
    }

    public function edit(Buku $buku)
    {
      
        $buku->load(['siswa', 'mentor']);

        $mentors = Mentor::all();

        $siswa = Siswa::all();

        return view('buku.edit', [
            'buku' => $buku,
            'mentors' => $mentors,
            'siswa' => $siswa
        ]);
       }

    public function update(Request $request, Buku $buku)
{
    // 1. Validasi
    $validated = $request->validate([
        'judul_buku'    => 'required|string|min:4',
        'penulis'       => 'required|string', 
        'tanggal_rilis' => 'required|date',
    ]);

    // 2. Cek Format (Guard Clause)
    if (!str_contains($request->penulis, '-')) {
        return back()->withErrors(['penulis' => 'Format penulis salah. Silakan pilih ulang.']);
    }

    // 3. Pecah Input & Cari User (Singkat)
    [$tipe, $id] = explode('-', $request->penulis);
    
    // Logika Ternary: Jika tipe siswa cari di Siswa, jika bukan cari di Mentor
    $user = ($tipe == 'siswa') ? Siswa::find($id) : Mentor::find($id);

    // 4. Update (Menggunakan array_merge)
    $buku->update(array_merge($validated, [
        // Ambil nama dengan Null Safe Operator (?->)
        'penulis'   => $user?->nama ?? 'Data Tidak Ditemukan',
        
        // Atur ID relasi (Salah satu wajib NULL)
        'siswa_id'  => $tipe == 'siswa' ? $id : null,
        'mentor_id' => $tipe == 'mentor' ? $id : null,
    ]));

    return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Diperbarui!');
}

    public function destroy(Buku $buku)
    {
        //
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data Buku Berhasil Dihapus');
    }
}
