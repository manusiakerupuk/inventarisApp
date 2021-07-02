
@include('Template.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('bukubarang.index') }}">Data Buku Barang</a></li>
              <li class="breadcrumb-item active">Tambah Buku Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
          <div class="card card-info card-outline">
              <div class="card-header">
                  <h3>Tambah Buku Barang</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('bukubarang.edit') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $bukubarang->id }}" name="id">
                    <div class="form-group">
                        <label for="exampleTipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="exampleTipe" placeholder="Tipe" value="{{ $bukubarang->tipe }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleTipe">Tanggal</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="tanggal" placeholder="Tanggal" value="{{ $bukubarang->tanggal }}"/>
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control select2" style="width: 100%;" name="barang_id">
                          @foreach ($barangs as $barang)
                            @if ($barang->id == $bukubarang->barang_id)
                              <option value="{{ $barang->id }}" selected>{{ $barang->nama }} | {{ $barang->ukuran }} | {{ $barang->satuan }}</option>
                            @else
                              <option value="{{ $barang->id }}">{{ $barang->nama }} | {{ $barang->ukuran }} | {{ $barang->satuan }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleJumlah">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="exampleJumlah" placeholder="Jumlah" value="{{ $bukubarang->jumlah }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleHargaSatuan">Harga Satuan</label>
                        <input type="text" class="form-control" name="hargasatuan" id="exampleHargaSatuan" placeholder="Harga Satuan" value="{{ $bukubarang->hargasatuan }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleNomorBeritaAcara">Nomor Berita Acara</label>
                        <input type="text" class="form-control" name="nomor" id="exampleNomorBeritaAcara" placeholder="Nomor Berita Acara" value="{{ $bukubarang->nomor }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleJumlahHarga">Jumlah Harga</label>
                        <input type="text" class="form-control" name="jumlahharga" id="exampleJumlahHarga" placeholder="Jumlah Harga" readonly value="{{ $bukubarang->jumlahharga }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleKeterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="exampleKeterangan" placeholder="Keterangan" value="{{ $bukubarang->keterangan }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Simpan Data</button>
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('Template.footer')

  <script>
    var startDate;
    var endDate;
    $(function () {
      $('.select2').select2({
        theme: 'bootstrap4'
      });
      $('#datetimepicker1').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
      $("#exampleJumlah").change(function(){
        var jumlah = $("#exampleJumlah").val();
        var harga = $("#exampleHargaSatuan").val();
        $("#exampleJumlahHarga").val(jumlah*harga);
      });
      $("#exampleHargaSatuan").change(function(){
        var jumlah = $("#exampleJumlah").val();
        var harga = $("#exampleHargaSatuan").val();
        $("#exampleJumlahHarga").val(jumlah*harga);
      });
    })
  </script>
