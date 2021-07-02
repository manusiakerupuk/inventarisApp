<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class bukuBarangExport implements FromView
{
    private $bukubarangs;
    private $distinctbukubarangs;

    public function __construct($bukubarangs, $distinctbukubarangs)
    {
        $this->bukubarangs = $bukubarangs;
        $this->distinctbukubarangs = $distinctbukubarangs;
    }

    public function view(): View
    {
        return view('export.bukubarang', ['bukubarangs' => $this->bukubarangs,'distinctbukubarangs' => $this->distinctbukubarangs]);
    }
}
