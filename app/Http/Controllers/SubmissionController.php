<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\LibraryModel;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function index()
    {
        $settings = SettingsModel::firstOrFail();
        return view('submission.submission', [
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:300'],
            'contributor' => ['max:300'],
            'writer' => ['required', 'max:100'],
            'publisher' => ['max:100'],
            'collection_type' => ['required'],
            "file" => ["required"],
            "file.*" => ["mimes:pdf"],
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul Maksimal 300 Karakter',
            'writer.required' => 'Penulis wajib diisi',
            'writer.max' => 'Penulis maksimal 100 karakter',
            'contributor.max' => 'Judul Maksimal 300 Karakter',
            'publisher.max' => 'Judul Maksimal 100 Karakter',
            'file.required' => 'File wajib diupload',
            'file.*.mimes' => 'File harus format .pdf'
        ]);
        $lib_id = 'LIB' . time();
        $request->mergeIfMissing(['u_id' => $lib_id]);
        LibraryModel::create($request->except(['_token', 'file']));
        foreach ($request->file('file') as $file) {
            $path = $file->store('');
            FileModel::create([
                'u_id' => 'FL' . strtoupper(Str::random(5)),
                'filename' => $file->getClientOriginalName(),
                'library_id' => $lib_id,
                'path' => $path
            ]);
        }
        return redirect()->to('/submission')->with('message', 'Berhasil disubmit, Submission akan divalidasi oleh Admin terlebih dahulu');
    }

    public function delete($u_id)
    {
        $collection = LibraryModel::where('u_id', $u_id)->firstOrFail();
        $files = FileModel::where('library_id', $u_id)->get();
        if (count($files) > 0) {
            foreach ($files as $file) {
                Storage::delete($file->path);
            }
        }

        FileModel::where('library_id', $u_id)->delete();
        $collection->delete();
        return redirect()->to('/dashboard')->with('message', 'Koleksi berhasil dihapus');
    }
}
