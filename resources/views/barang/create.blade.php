
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
              <li class="breadcrumb-item active">Tambah Barang</li>
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
                  <h3>Tambah Barang</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('barang.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleNama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleNama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleUkuranMerk">Ukuran / Merk</label>
                        <input type="text" class="form-control" name="ukuran" id="exampleUkuranMerk" placeholder="Ukuran / Merk">
                    </div>
                    <div class="form-group">
                        <label for="exampleSatuanBarang">Satuan Barang</label>
                        <input type="text" class="form-control" name="satuan" id="exampleSatuanBarang" placeholder="Satuan Barang">
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
