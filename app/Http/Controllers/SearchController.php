<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function penelitian_search(Request $request)
    {
        $search = $request->search;

        $penelitian = Penelitian::where('judul_program', 'like',"%".$search."%")->orWhere('jenis_program', 'like',"%".$search."%")->get();

        if ($penelitian->count() > 0) {
            return view('pages.user.penelitian', [
                'penelitians' => $penelitian
            ]);
        }else {
            return redirect()->route('home-penelitian')->with(['error' => 'Masukkan Kata Kunci Dengan Benar']);
        }
    }
}
