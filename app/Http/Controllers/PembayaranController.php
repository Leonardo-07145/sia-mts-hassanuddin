<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\JenisTahunAjaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $pembayaran = Pembayaran::with(['siswa', 'jenispembayaran', 'jenistahunajaran'])
                                    ->where('tgl_pembayaran', 'like', "%" . $request->search . "%")
                                    ->orWhereHas('siswa', function($query) use($request) {
                                        $query->where('nama', 'like', "%" . $request->search . "%");
                                    })
                                    ->orWhereHas('jenispembayaran', function($query) use($request) {
                                        $query->where('nama', 'like', "%" . $request->search . "%");
                                    })
                                    ->orWhereHas('jenistahunajaran', function($query) use($request) {
                                        $query->where('nama', 'like', "%" . $request->search . "%");
                                    })
                                    ->paginate();
        }else{
            $pembayaran = Pembayaran::all();
        }

        return view('tu.pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tu.pembayaran.create', [
            'siswa' => Siswa::all(),
            'jenispembayaran' => JenisPembayaran::all(),
            'jenistahunajaran' => JenisTahunAjaran::all()
        ]);
    }
    // public function create2($id)
    // {
    //     return view('tu.pembayaran.create', [
    //         'siswa' => Siswa::findOrFail($id)
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'jenispembayaran_id' => 'required',
            'jenistahunajaran_id' => 'required',
            'tgl_pembayaran' => 'required'
        ]);

        Pembayaran::create($validatedData);

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::where('siswa_id', $id)->get();
        $siswa = Siswa::where('id', $id)->first();

        return view('tu.pembayaran.show', compact('pembayaran', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('tu.pembayaran.edit', [
            'pembayaran' => $pembayaran,
            'siswa' => Siswa::all(),
            'jenispembayaran' => JenisPembayaran::all(),
            'jenistahunajaran' => JenisTahunAjaran::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'siswa_id' => 'required',
            'jenispembayaran_id' => 'required',
            'jenistahunajaran_id' => 'required',
            'tgl_pembayaran' => 'required'
        ]);

        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bayar = Pembayaran::findOrFail($id);
        $bayar->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
