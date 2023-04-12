<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = SettingsModel::first();
        return view('dashboard.settings', ['settings' => $settings]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'allow_to_submit' => 'required'
        ]);

        SettingsModel::first()->update($request->except(['_token']));
        return redirect()->to('/dashboard/settings')->with('message', 'Pengaturan Berhasil disimpan');
    }
}
