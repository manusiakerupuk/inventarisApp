<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\bukubarang;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barangs = barang::all();
        if ($request->ajax()) {
            return DataTables()->of($barangs)
             ->addColumn('action', function($row){
    
                           $btn = '<a href="/barang/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn .= '&nbsp;&nbsp;';
                           $btn .= '<a href="/barang/'.$row->id.'/destroy" class="edit btn btn-danger btn-sm">Delete</a>';
         
                            return $btn;
                    })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('barang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        barang::create([
            'nama' => $request->nama,
            'ukuran' => $request->ukuran,
            'satuan' => $request->satuan
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = barang::find($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $barangs = barang::where('id', $request->id)->update([
            'nama' => $request->nama,
            'ukuran' => $request->ukuran,
            'satuan' => $request->satuan
        ]);
        // var_dump($barangs);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di ubah');
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
        $delete = barang::where('id', $id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil di hapus');
    }
}
