<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class kartuBarangExport implements FromView
{
    private $bukubarangs;

    public function __construct($bukubarangs)
    {
        $this->bukubarangs = $bukubarangs;
    }

    public function view(): View
    {
        return view('export.kartubarang', ['bukubarangs' => $this->bukubarangs]);
    }
}
