
@include('Template.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
          <div class="card card-info card-outline">
            
              <div class="card-header">
                  <div class="card-tools">
                      <a href="{{ route('barang.create') }}" class="btn btn-success"> Tambah Data <i class="fa fa-plus-square"></i></a>
                  </div>
              </div>
              <div class="card-body">
                <table id="data-barang" class="table table-bordered data-table" >
                  <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Ukuran / Merk</th>
                        <th>Satuan Barang</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
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
    $(function() {
      $('#data-barang').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('barang.index') !!}',
          columns: [
              { data: 'nama', name: 'nama' },
              { data: 'ukuran', name: 'ukuran' },
              { data: 'satuan', name: 'satuan' },
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  });
  </script>
