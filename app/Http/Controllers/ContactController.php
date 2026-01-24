<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $to = "kakarecive@gmail.com";

        try{
            Mail::to($to)->send(new ContactMail($validated));

            return redirect()->back()->with('success', 'Pesan Berhasil Terkirim!');        
        
        } catch (\Exception $e){
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
