<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $query = Peserta::with('skema');

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_peserta', 'like', "%{$request->search}%")
                  ->orWhere('nik', 'like', "%{$request->search}%");
        }

        $pesertas = $query->get();
        $skemas = Skema::all();
        
        return view('peserta.index', compact('pesertas', 'skemas'));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'nik' => 'required|unique:pesertas,nik',
            'nama_peserta' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'skema_id' => 'required|exists:skemas,id'
        ]);

        Peserta::create($request->all());
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show($id)
    {
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $peserta = Peserta::findOrFail($id);
        
        $request->validate([
            'nik' => 'required|unique:pesertas,nik,' . $peserta->id,
            'nama_peserta' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'skema_id' => 'required|exists:skemas,id'
        ]);

        $peserta->update($request->all());
        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('user.dashboard')->with('error', 'Akses ditolak!');
        }

        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil dihapus.');
    }
}
