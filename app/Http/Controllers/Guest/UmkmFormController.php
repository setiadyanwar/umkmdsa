<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\UmkmCategory;
use App\Models\UmkmForm;
use App\Models\UmkmFormToken;
use Illuminate\Http\Request;

class UmkmFormController extends Controller
{
    public function create(Request $request)
    {
        $tokenValue = $request->query('token');
        $token = null;
        $isTokenValid = false;
        $expiresAt = null;

        if ($tokenValue) {
            $token = UmkmFormToken::where('token', $tokenValue)->first();
            if ($token && !$token->used && $token->expires_at > now()) {
                $isTokenValid = true;
                $expiresAt = $token->expires_at;
            }
        }

        $categories = UmkmCategory::all();

        return view('daftar-usaha', [
            'isTokenValid' => $isTokenValid,
            'expiresAt' => $expiresAt,
            'token' => $tokenValue,
            'categories' => $categories,
        ]);
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
            'started_at' => 'required|date',
            'location' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'facebook' => 'nullable|string',
            'open_hour' => 'nullable|date_format:H:i',
            'close_hour' => 'nullable|date_format:H:i',
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
