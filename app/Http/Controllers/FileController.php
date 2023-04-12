<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\LibraryModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index($file_id)
    {
        $file_data = FileModel::where('u_id', $file_id)->firstOrFail();

        $library_data = LibraryModel::where('u_id', $file_data->library_id)->firstOrFail();
        $is_admin = false;
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                $is_admin = true;
            }
        }
        if ($library_data->visibility == 'public' || $is_admin == true) {
            header("Content-type: application/pdf");
            header('Content-Disposition: inline; filename=' . $file_data->filename);
            readfile(storage_path('app/submission/') .   $file_data->path);
        } else {
            return response()->json([
                'message' => "You're not allowed to access this resource",
                'code' => 400
            ]);
        }
    }

    public function delete($file_id)
    {
        $file = FileModel::where('u_id', $file_id)->firstOrFail();
        $library_id = $file->library_id;
        Storage::delete($file->path);

        $file->delete();
        return redirect()->to('/dashboard/edit/' . $library_id)->with('message', 'File berhasil dihapus');
    }
}
