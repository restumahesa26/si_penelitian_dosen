<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    public function index()
    {
        $items = Penelitian::where('user_id', Auth::user()->id)->get();

        return view('pages.dosen.data-penelitian.index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.dosen.data-penelitian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_1' => ['required', 'string', 'max:255'],
            'jenis_program' => ['required', 'string', 'max:255'],
            'judul_program' => ['required', 'string', 'max:255'],
            'link_jurnal' => ['required', 'string', 'max:255'],
            'judul_jurnal' => ['required', 'string', 'max:255'],
            'nama_file' => ['required', 'mimes:pdf'],
        ]);

        $value = $request->file('nama_file');
        $extension = $value->extension();
        $imageNames = 'file' . $request->judul_program . '.' . $extension;
        Storage::putFileAs('public/file-program', $value, $imageNames);

        Penelitian::create([
            'user_id' => Auth::user()->id,
            'anggota_1' => $request->anggota_1,
            'anggota_2' => $request->anggota_2,
            'jenis_program' => $request->jenis_program,
            'judul_program' => $request->judul_program,
            'link_jurnal' => $request->link_jurnal,
            'judul_jurnal' => $request->judul_jurnal,
            'link_luaran_1' => $request->link_luaran_1,
            'link_luaran_2' => $request->link_luaran_2,
            'nama_file' => $imageNames,
        ]);

        return redirect()->route('penelitian.index');
    }

    public function edit($id)
    {
        $item = Penelitian::findOrFail($id);

        return view('pages.dosen.data-penelitian.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anggota_1' => ['required', 'string', 'max:255'],
            'jenis_program' => ['required', 'string', 'max:255'],
            'judul_program' => ['required', 'string', 'max:255'],
            'link_jurnal' => ['required', 'string', 'max:255'],
            'judul_jurnal' => ['required', 'string', 'max:255'],
            'link_luaran_1' => ['required', 'string', 'max:255'],
        ]);

        $item = Penelitian::findOrFail($id);

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $imageNames = 'file' . $request->judul_program . '.' . $extension;
            Storage::putFileAs('public/file-program', $value, $imageNames);
        } else {
            $imageNames = $item->nama_file;
        }

        $item->update([
            'anggota_1' => $request->anggota_1,
            'anggota_2' => $request->anggota_2,
            'jenis_program' => $request->jenis_program,
            'judul_program' => $request->judul_program,
            'link_jurnal' => $request->link_jurnal,
            'judul_jurnal' => $request->judul_jurnal,
            'link_luaran_1' => $request->link_luaran_1,
            'link_luaran_2' => $request->link_luaran_2,
            'nama_file' => $imageNames,
            'status' => 'Submit',
        ]);

        return redirect()->route('penelitian.index');
    }

    public function index_2()
    {
        $items = Penelitian::all();

        return view('pages.data-penelitian-2.index', [
            'items' => $items
        ]);
    }

    public function index_3()
    {
        $items = Penelitian::all();

        return view('pages.manajer.penelitian-index', [
            'items' => $items
        ]);
    }

    public function verifikasi($id)
    {
        $item = Penelitian::findOrFail($id);

        $item->update([
            'status' => 'Accept'
        ]);

        return redirect()->route('penelitian.index-2');
    }

    public function batalkan(Request $request, $id)
    {
        $item = Penelitian::findOrFail($id);

        $item->update([
            'status' => 'Reject',
            'pesan' => $request->pesan
        ]);

        return redirect()->route('penelitian.index-2');
    }

    public function destroy($id)
    {
        $item = Penelitian::findOrFail($id);

        $item->delete();

        return redirect()->route('penelitian.index');
    }
}
