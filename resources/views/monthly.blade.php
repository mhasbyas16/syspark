@extends('temamenuheader')
@section('isi')

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id_petugas</th>
                      <th>nik</th>
                      <th>nama</th>
                      <th>status</th>
                      <th>email</th>
                      <th>jk</th>
                      <th>agama</th>
                      <th>alamat</th>
                      <th>telefon</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id_petugas</th>
                      <th>nik</th>
                      <th>nama</th>
                      <th>status</th>
                      <th>email</th>
                      <th>jk</th>
                      <th>agama</th>
                      <th>alamat</th>
                      <th>telefon</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($reportm as $reportm)
                    <tr>
                        <td>{{$reportm->id_petugas}}</td>
                        <td>{{$reportm->nik}}</td>
                        <td>{{$reportm->nama}}</td>
                        <td>{{$reportm->status}}</td>
                        <td>{{$reportm->email}}</td>
                        <td>{{$reportm->jk}}</td>
                        <td>{{$reportm->agama}}</td>
                        <td>{{$reportm->alamat}}</td>
                        <td>{{$reportm->no_tlfn}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                <script>
                  $(document).ready(function() {
                     $('#dataTable').DataTable( {
                          "processing": true,
                          "serverSide": true,
                      } );
                  } );
                </script>

                <script>
                            $(document).ready(function(){
                              $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });
                            </script>

                <table border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td class="gutter">
                        <div class="line number1 index0 alt2" style="display: none;">1</div>
                      </td>
                      <td class="code">
                        <div class="container" style="display: none;">
                          <div class="line number1 index0 alt2" style="display: none;">&nbsp;</div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

<script>
  $(document).ready(function(){
    $('select').material_select();
  });
</script>

@endsection
