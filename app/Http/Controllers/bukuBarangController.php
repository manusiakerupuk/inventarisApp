<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\bukubarang;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\bukuBarangExport;

class bukuBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '' ) {
                $bukubarangs = bukubarang::whereBetween('tanggal', [$request->from_date, $request->to_date])
                                            ->get();
            } else {
                $bukubarangs = bukubarang::all();
            }
            return DataTables()->of($bukubarangs)
             ->addColumn('action', function($row){
                        $btn = '<a href="/bukubarang/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
                        $btn .= '&nbsp;&nbsp;';
                        $btn .= '<a href="/bukubarang/'.$row->id.'/destroy" class="edit btn btn-danger btn-sm">Delete</a>';
                        return $btn;
                    })
            ->addColumn('nama', function($row){
                        return $row->barang['nama'];
                    })
            ->addColumn('ukuran', function($row){
                        return $row->barang['ukuran'];
                    })
            ->addColumn('satuan', function($row){
                        return $row->jumlah .' | '.$row->barang['satuan'];
                    })
            ->rawColumns(['action', 'nama', 'ukuran', 'satuan'])
            ->make(true);
        }

        return view('bukubarang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = barang::all();
        return view('bukubarang.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        bukubarang::create([
            'tipe' => $request->tipe,
            'barang_id' => $request->barang_id,
            'tanggal' => Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d'),
            'jumlah' => $request->jumlah,
            'hargasatuan' => $request->hargasatuan,
            'nomor' => $request->nomor,
            'jumlahharga' => $request->jumlahharga,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('bukubarang.index')->with('success', 'Buku Barang berhasil di ubah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangs = barang::all();
        $bukubarang = bukubarang::find($id);
        return view('bukubarang.edit', compact('barangs', 'bukubarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $bukubarangs = bukubarang::where('id', $request->id)->update([
            'tipe' => $request->tipe,
            'barang_id' => $request->barang_id,
            'tanggal' => Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d'),
            'jumlah' => $request->jumlah,
            'hargasatuan' => $request->hargasatuan,
            'nomor' => $request->nomor,
            'jumlahharga' => $request->jumlahharga,
            'keterangan' => $request->keterangan
        ]);
        // var_dump($barangs);
        return redirect()->route('bukubarang.index')->with('success', 'Buku Barang berhasil di ubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = bukubarang::where('id', $id)->delete();
        return redirect()->route('bukubarang.index')->with('success', 'Buku Barang berhasil di hapus');
    }

    public function export(Request $request) 
    {   
        $distinctbukubarangs = bukubarang::distinct()->get('tipe');

        if ($request->from_date != '' && $request->to_date != '' ) {
            $bukubarangs = bukubarang::whereBetween('tanggal', [$request->from_date, $request->to_date])
                                            ->get();
        } else {
            $bukubarangs = bukubarang::all();
        }
        $nama_file = 'laporan_buku_barang_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new bukuBarangExport($bukubarangs, $distinctbukubarangs), $nama_file);
        $bukubarangs = bukubarang::all();
        $distinctbukubarangs = bukubarang::distinct()->get('tipe');
        // return view('export.bukubarang', compact('bukubarangs','distinctbukubarangs'));
    }
}
