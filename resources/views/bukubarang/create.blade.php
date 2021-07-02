
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
                <form action="{{ route('bukubarang.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleTipe">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="exampleTipe" placeholder="Tipe">
                    </div>
                    <div class="form-group">
                        <label for="exampleTipe">Tanggal</label>
                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="tanggal" placeholder="Tanggal"/>
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control select2" style="width: 100%;" name="barang_id">
                          @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama }} | {{ $barang->ukuran }} | {{ $barang->satuan }}</option>
                              
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleJumlah">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="exampleJumlah" placeholder="Jumlah">
                    </div>
                    <div class="form-group">
                        <label for="exampleHargaSatuan">Harga Satuan</label>
                        <input type="text" class="form-control" name="hargasatuan" id="exampleHargaSatuan" placeholder="Harga Satuan">
                    </div>
                    <div class="form-group">
                        <label for="exampleNomorBeritaAcara">Nomor Berita Acara</label>
                        <input type="text" class="form-control" name="nomor" id="exampleNomorBeritaAcara" placeholder="Nomor Berita Acara">
                    </div>
                    <div class="form-group">
                        <label for="exampleJumlahHarga">Jumlah Harga</label>
                        <input type="text" class="form-control" name="jumlahharga" id="exampleJumlahHarga" placeholder="Jumlah Harga" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleKeterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="exampleKeterangan" placeholder="Keterangan">
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
