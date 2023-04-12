<?php

namespace App\Http\Controllers;

use App\Models\FileModel;
use App\Models\LibraryModel;
use App\Models\SettingsModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $library = LibraryModel::where(function (Builder $query) {
            return $query->where('visibility', 'public')->orWhere('visibility', 'restricted');
        })->orderby('id', 'DESC')->paginate(5);
        if ($request->search) {
            $library = LibraryModel::where('title', 'LIKE', "%{$request->search}%")->orWhere('abstract', 'LIKE', "%{$request->search}%")->orWhere('writer', 'LIKE', "%{$request->search}%")->orWhere('u_id', 'LIKE', "%{$request->search}%")->orWhere('publisher', 'LIKE', "%{$request->search}%")->orWhere('contributor', 'LIKE', "%{$request->search}%")->where(function (Builder $query) {
                return $query->where('visibility', 'public')->orWhere('visibility', 'restricted');
            })->orderby('id', 'DESC')->paginate(5);
        }
        if ($request->category) {
            $library = LibraryModel::where('collection_type', $request->category)->where(function (Builder $query) {
                return $query->where('visibility', 'public')->orWhere('visibility', 'restricted');
            })->orderby('id', 'DESC')->paginate(5);
        }
        $settings = SettingsModel::firstOrFail();
        return view('landing_page.welcome', [
            'library' => $library,
            'settings' => $settings
        ]);
    }


    public function detail($u_id)
    {
        $data = LibraryModel::where('u_id', $u_id)->where(function (Builder $query) {
            return $query->where('visibility', 'public')->orWhere('visibility', 'restricted');
        })->firstOrFail();
        $others = LibraryModel::inRandomOrder()->limit(5)->get();
        $files = FileModel::where('library_id', $u_id)->get();
        $settings = SettingsModel::firstOrFail();
        return view('landing_page.detail', [
            'data' => $data,
            'files' => $files,
            'others' => $others,
            'settings' => $settings

        ]);
    }
}
