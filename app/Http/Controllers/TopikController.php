<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TopikPenelitian;

class TopikController extends Controller
{
    // Nampilin semua data
    public function index()
    {
        $topiks = TopikPenelitian::all();
        return view('topik.index', compact('topiks'));
    }

    // Buka form tambah data
    public function create()
    {
        return view('topik.create');
    }

    // Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'topik' => 'required',
            'rumpun_ilmu' => 'required',
            'kata_kunci' => 'required',
            'deskripsi' => 'required',
        ]);

        TopikPenelitian::create($request->all());
        return redirect()->route('topik.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Buka form edit data
    public function edit($id)
    {
        $topik = TopikPenelitian::findOrFail($id);
        return view('topik.edit', compact('topik'));
    }

    // Simpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'topik' => 'required',
            'rumpun_ilmu' => 'required',
            'kata_kunci' => 'required',
            'deskripsi' => 'required',
        ]);

        $topik = TopikPenelitian::findOrFail($id);
        $topik->update($request->all());
        return redirect()->route('topik.index')->with('success', 'Data berhasil diupdate!');
    }

    // Hapus data
    public function destroy($id)
    {
        $topik = TopikPenelitian::findOrFail($id);
        $topik->delete();
        return redirect()->route('topik.index')->with('success', 'Data berhasil dihapus!');
    }
}