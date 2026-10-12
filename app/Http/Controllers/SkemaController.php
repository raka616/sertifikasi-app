<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::all();
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        return view('skema.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema',
            'nama_skema' => 'required',
            'jenis' => 'required',
            'jumlah_unit' => 'required|numeric',
        ]);

        Skema::create($request->all());
        return redirect()->route('skema.index')->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $skema = Skema::findOrFail($id);
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}
