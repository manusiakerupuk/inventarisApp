<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class kartuBarangExport implements FromView
{
    private $bukubarangs;

    public function __construct($bukubarangs, $nama, $nip)
    {
        $this->bukubarangs = $bukubarangs;
        $this->nama = $nama;
        $this->nip = $nip;
    }

    public function view(): View
    {
        return view('export.kartubarang', [
            'bukubarangs' => $this->bukubarangs,
            'nama' => $this->nama,
            'nip' => $this->nip,
        ]);
    }
}
