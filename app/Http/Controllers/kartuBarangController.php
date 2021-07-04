<?php

namespace App\Http\Controllers;

use App\Exports\kartuBarangExport;
use App\Models\barang;
use App\Models\bukubarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class kartuBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->barang_id != '' ) {
                $bukubarangs = bukubarang::where('barang_id', $request->barang_id)
                                            ->get();
            } else {
                $bukubarangs = bukubarang::all();
            }
            return DataTables()->of($bukubarangs)
            ->addColumn('sisa', function($row){
                        return 0;
                    })
            ->rawColumns(['sisa', 'keterangan'])
            ->make(true);
        }
        $barangs = barang::all();
        return view('kartubarang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function export(Request $request) {
        if ($request->barang_id != '' ) {
                $bukubarangs = bukubarang::where('barang_id', $request->barang_id)
                                            ->get();
        } else {
                $bukubarangs = bukubarang::all();
        }
        $nama_file = 'laporan_kartu_barang_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new kartuBarangExport($bukubarangs), $nama_file);
    }
}
