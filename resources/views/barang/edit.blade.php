
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
              <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Data Barang</a></li>
              <li class="breadcrumb-item active">Ubah Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
          @if (session('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
          @endif
          <div class="card card-info card-outline">
              <div class="card-header">
                  <h3>Ubah Barang</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('barang.edit') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $barang->id }}">
                    <div class="form-group">
                        <label for="exampleNama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleNama" placeholder="Nama" value="{{ $barang->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleUkuranMerk">Ukuran / Merk</label>
                        <input type="text" class="form-control" name="ukuran" id="exampleUkuranMerk" placeholder="Ukuran / Merk" value="{{ $barang->ukuran }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSatuanBarang">Satuan Barang</label>
                        <input type="text" class="form-control" name="satuan" id="exampleSatuanBarang" placeholder="Satuan Barang" value="{{ $barang->satuan }}">
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
