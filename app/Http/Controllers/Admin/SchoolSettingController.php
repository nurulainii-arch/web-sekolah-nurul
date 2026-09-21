<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolSettingController extends Controller
{
    public function index()
    {
        $setting = SchoolSetting::first();
        return view('admin.school_setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SchoolSetting::first() ?? new SchoolSetting();

        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'principal_name' => 'nullable|string|max:255',
            'principal_welcome' => 'nullable|string',
            'principal_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'hero_background' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'visimisi_background' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'jumlah_siswa' => 'nullable|integer|min:0',
            'jumlah_guru' => 'nullable|integer|min:0',
            'jumlah_alumni' => 'nullable|integer|min:0',
            'jumlah_prestasi' => 'nullable|integer|min:0',
            'nilai_akreditasi' => 'nullable|string|max:10',
            'no_sk_akreditasi' => 'nullable|string|max:255',
            'tanggal_akreditasi' => 'nullable|date',
            'file_akreditasi' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'maps_embed_url' => 'nullable|string',
        ]);

        if ($request->hasFile('principal_photo')) {
            if ($setting->principal_photo) {
                Storage::disk('public')->delete($setting->principal_photo);
            }
            $validated['principal_photo'] = $request->file('principal_photo')->store('school', 'public');
        }

        if ($request->hasFile('hero_background')) {
            if ($setting->hero_background) {
                Storage::disk('public')->delete($setting->hero_background);
            }
            $validated['hero_background'] = $request->file('hero_background')->store('school', 'public');
        }

        if ($request->hasFile('visimisi_background')) {
            if ($setting->visimisi_background) {
                Storage::disk('public')->delete($setting->visimisi_background);
            }
            $validated['visimisi_background'] = $request->file('visimisi_background')->store('school', 'public');
        }

        if ($request->hasFile('file_akreditasi')) {
            if ($setting->file_akreditasi) {
                Storage::disk('public')->delete($setting->file_akreditasi);
            }
            $validated['file_akreditasi'] = $request->file('file_akreditasi')->store('akreditasi', 'public');
        }

        $setting->fill($validated)->save();

        return back()->with('success', 'Pengaturan profil sekolah berhasil diperbarui!');
    }
}