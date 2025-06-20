<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\UmkmCategory;
use App\Models\UmkmForm;
use App\Models\UmkmFormToken;
use Illuminate\Http\Request;
use Str;

class UmkmFormController extends Controller
{
    public function create(Request $request)
    {
        $tokenValue = $request->query('token');
        $token = null;
        $tokenStatus = 'none';
        $expiresAt = null;

        if ($tokenValue) {
            $token = UmkmFormToken::where('token', $tokenValue)->first();
            if ($token) {
                if ($token->used) {
                    $tokenStatus = 'used';
                } elseif ($token->expires_at <= now()) {
                    $tokenStatus = 'expired';
                } else {
                    $tokenStatus = 'valid';
                    $expiresAt = $token->expires_at;
                }
            } else {
                $tokenStatus = 'invalid';
            }
        }

        $categories = UmkmCategory::all();

        return view('daftar-usaha', [
            'tokenStatus' => $tokenStatus,
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
            'province' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'facebook' => 'nullable|url',
            'open_hour' => 'nullable|date_format:H:i',
            'close_hour' => 'nullable|date_format:H:i',
            'documents' => 'nullable|array|max:5',
            'documents.*' => 'nullable|file|max:2048|mimes:pdf,jpg,jpeg,png,doc,docx',
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
        $umkmForm = UmkmForm::create($data);

        // Simpan lampiran jika ada
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $uuid = Str::random(6);
                $filename = Str::slug($originalName) . '-' . $uuid . '.' . $extension;

                $path = $file->storeAs('form_attachments', $filename, 'public');

                $umkmForm->attachments()->create([
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Form berhasil dikirim.');
    }
}
