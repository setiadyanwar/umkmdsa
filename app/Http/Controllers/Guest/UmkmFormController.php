<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\UmkmForm;
use App\Models\UmkmFormToken;
use Illuminate\Http\Request;

class UmkmFormController extends Controller
{
    public function create(Request $request)
    {
        $token = $request->query('token');
        return view('guest.umkm_form.create', compact('token')); // TODO: Sesuaikan path view
    }


    public function store(Request $request)
    {
        // Ambil token dari query URL
        $tokenQuery = $request->query('token');

        // Validasi form
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:umkm_categories,id',
            'location' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'facebook' => 'nullable|string',
            'registered_at' => 'required|date',
            'open_hour' => 'required',
            'close_hour' => 'required',
            'map_embed_url' => 'nullable|string',
        ]);

        // Cek token jika diisi
        if ($tokenQuery) {
            $token = UmkmFormToken::where('token', $tokenQuery)->first();

            if (!$token || $token->used || $token->expires_at < now()) {
                return back()->withErrors(['form_token' => 'Token tidak valid atau sudah kedaluwarsa.'])->withInput();
            }

            // Tandai token sudah dipakai
            $token->used = true;
            $token->save();
        }

        // Simpan logo jika ada
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('form_logos', 'public');
        }

        // Simpan data form
        UmkmForm::create($data);

        return redirect()->back()->with('success', 'Form berhasil dikirim.');
    }
}
