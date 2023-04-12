<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\LibraryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $collections = LibraryModel::orderBy('id', "ASC")->get();
        return view('dashboard.dashboard', [
            'collections' => $collections
        ]);
    }


    public function edit($u_id)
    {
        $collection = LibraryModel::where('u_id', $u_id)->firstOrFail();
        $files = FileModel::where('library_id', $u_id)->get();
        return view('dashboard.edit', [
            'collection' => $collection,
            'files' => $files
        ]);
    }

    public function update($u_id, Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:300'],
            'contributor' => ['max:300'],
            'writer' => ['required', 'max:100'],
            'publisher' => ['max:100'],
            'collection_type' => ['required'],
            "file.*" => ["mimes:pdf"],
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul Maksimal 300 Karakter',
            'writer.required' => 'Penulis wajib diisi',
            'writer.max' => 'Penulis maksimal 100 karakter',
            'contributor.max' => 'Judul Maksimal 300 Karakter',
            'publisher.max' => 'Judul Maksimal 100 Karakter',
            'file.*.mimes' => 'File harus format .pdf'
        ]);

        if ($request->file('file')) {
            foreach ($request->file('file') as $file) {
                $path = $file->store('');
                FileModel::create([
                    'u_id' => 'FL' . strtoupper(Str::random(5)),
                    'filename' => $file->getClientOriginalName(),
                    'library_id' => $u_id,
                    'path' => $path
                ]);
            }
        }
        LibraryModel::where('u_id', $u_id)->update($request->except(['_token', 'file']));
        return redirect()->to('/dashboard')->with('message', 'Berhasil disimpan');
    }
}
