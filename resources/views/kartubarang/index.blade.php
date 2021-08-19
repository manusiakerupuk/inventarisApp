
@include('Template.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kartu Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('Dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Kartu Barang</li>
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
                <form action="{{ route('kartubarang.export') }}" method="get">
                <div class="input-group col-sm-6" >
                    <div class="row input-daterange">
                      <div class="form-group">
                        <select class="form-control select2" style="width: 100%; margin-right: 5pt;" name="barang_id" id="barang_id" >
                            <option value="">-- SEMUA --</option>
                          @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">{{ $barang->nama }} | {{ $barang->ukuran }} | {{ $barang->satuan }}</option>
                          @endforeach
                        </select>
                    </div>
                      <div class="">
                          <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                          <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                      </div>
                  </div>
                </div>
                  <div class="card-tools" style="margin-top: 10pt">
                      {{-- <a href="{{ route('bukubarang.create') }}" class="btn btn-success" style="margin-right: 5pt"> Tambah Data <i class="fa fa-plus-square"></i></a> --}}
                      <button href="" id="btn-export" class="btn btn-info float-right"> Export Excel </button >
                      <input type="text" name="nip" class="float-right" style="margin-right: 5pt" id="nip" placeholder="NIP">
                      <input type="text" name="nama" class="float-right" style="margin-right: 5pt" id="nama" placeholder="Nama">
                  </div>
                </form>
              </div>
              <div class="card-body">
                <table id="data-barang" class="table table-bordered data-table" >
                  <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Sisa</th>
                        <th>Keterangan</th>
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
        $('.select2').select2();

      load_data();

      function load_data(barang_id = '')
      {
        var table = $('#data-barang').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('kartubarang.index') !!}',
              data: {barang_id:barang_id}                 
              },
            columns: [
                { data: 'tanggal', name: 'tanggal' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'sisa', name: 'sisa' },
                { data: 'keterangan', name: 'keterangan' },
            ]
        });
      }
      
      $('#filter').click(function(){
        var barang_id = $('#barang_id').val();
        if(barang_id != '')
        {
          $('#data-barang').DataTable().destroy();
          load_data(barang_id);
        }
        else
        {
          alert('Select is required');
        }
      });

      $('#refresh').click(function(){
        $('#barang_id').val('')
        $('#data-barang').DataTable().destroy();
        load_data();
      });

      $('#btn-export').click(function()
      {
        var barang_id = $('#barang_id').val();
        var nama = $('#nama').val();
        var nip = $('#nip').val();
      });
  });
  </script>
