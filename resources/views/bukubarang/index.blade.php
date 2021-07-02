
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
                <form action="{{ route('bukubarang.export') }}" method="get">
                <div class="input-group col-sm-6" >
                    <div class="row input-daterange">
                      <div class="input-group date col-md-4" id="datetimepicker1" data-target-input="nearest">
                          <input id="daritanggal" name="from_date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" placeholder="Dari Tanggal"/>
                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      <div class="input-group date col-md-4" id="datetimepicker2" data-target-input="nearest">
                          <input id="ketanggal" name="to_date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" placeholder="Ke Tanggal"/>
                          <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                          <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                      </div>
                  </div>
                </div>
                  <div class="card-tools" style="margin-top: 10pt">
                      <a href="{{ route('bukubarang.create') }}" class="btn btn-success" style="margin-right: 5pt"> Tambah Data <i class="fa fa-plus-square"></i></a>
                      <button href="" id="btn-export" class="btn btn-info float-right"> Export Excel </button >
                  </div>
                </form>
              </div>
              <div class="card-body">
                <table id="data-barang" class="table table-bordered data-table" >
                  <thead>
                    <tr>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Ukuran / Merk</th>
                        <th>Jumlah | Satuan</th>
                        <th>Harga Satuan</th>
                        <th>Nomor BA</th>
                        <th>Jumlah Harga</th>
                        <th>Ket.</th>
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
      $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
      $('#datetimepicker2').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

      load_data();

      function load_data(from_date = '', to_date = '')
      {
        var table = $('#data-barang').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('bukubarang.index') !!}',
              data: {from_date:from_date, to_date:to_date}                 
              },
            columns: [
                { data: 'tipe', name: 'tipe' },
                { data: 'tanggal', name: 'tanggal' },
                { data: 'nama', name: 'nama' },
                { data: 'ukuran', name: 'ukuran' },
                { data: 'satuan', name: 'satuan' },
                { data: 'hargasatuan', name: 'hargasatuan' },
                { data: 'nomor', name: 'nomor' },
                { data: 'jumlahharga', name: 'jumlahharga' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
      }
      
      $('#filter').click(function(){
        var from_date = $('#daritanggal').val();
        var to_date = $('#ketanggal').val();
        if(from_date != '' &&  to_date != '')
        {
          $('#data-barang').DataTable().destroy();
          load_data(from_date, to_date);
        }
        else
        {
          alert('Both Date is required');
        }
      });

      $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#data-barang').DataTable().destroy();
        load_data();
      });

      $('#btn-export').click(function()
      {
        var from_date = $('#daritanggal').val();
        var to_date = $('#ketanggal').val();
        $.ajax(
        {
          url: '{!! route('bukubarang.export') !!}',
          data: {from_date:from_date, to_date:to_date}
        }
        );
      });
  });
  </script>
