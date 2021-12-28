<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function penelitian_search(Request $request)
    {
        $search = $request->search;

        $penelitian = Penelitian::where('status', 'Accept')
        ->where(function($query) use ($search){
            $query->where('jenis_program', 'LIKE', '%'.$search.'%')
                    ->orWhere('judul_program', 'LIKE', '%'.$search.'%');
        })->paginate(10);
        $penelitian->appends(['search' => $search]);

        if ($penelitian->count() > 0) {
            return view('pages.user.penelitian', [
                'penelitians' => $penelitian
            ]);
        }else {
            return redirect()->route('home-penelitian')->with(['error' => 'Masukkan Kata Kunci Dengan Benar']);
        }
    }
}
