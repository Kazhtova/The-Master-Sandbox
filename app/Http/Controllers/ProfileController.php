<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profile = Auth::user();

        return view('profile.index', ['users' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        //
        
        $profile = Auth::user();
        return view('profile.edit', ['users' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        /** @var \App\Models\User $profile */
        $profile = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($profile->id)],
            'password' => 'nullable|min:8|confirmed'
        ]);

        $profile->nama = $request->nama;
        $profile->email = $request->email;

        if($request->filled('password')){
            $profile->password = Hash::make($request->password);
        }
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Berhasil Update Data Profile User');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
