@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800" align="center">History Log</h1>
            </div>
            <div class="row justify-content-center">
                @if (\Session::has('successalert'))
                    <div class="alert alert-success text-center">
                        <strong> Success! </strong> {{Session::get('successalert')}}
                    </div>
                    @elseif (\Session::has('alert'))
                        <div class="alert alert-danger text-center">
                            <strong> Success! </strong> {{Session::get('alert')}}
                        </div>
                @endif

          <table id="pegawai" class="display text-center nowrap" cellspacing="0" width="100%" border="1" >
                  <thead>
                      <tr>
                          <th width="5%">ID Petugas</th>
                          <th width="15%">Nama</th>
                          <th width="6%">Tanggal</th>
                          <th width="6%">Jam</th>
                          <th width="20%">Deskripsi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th width="5%">ID Petugas</th>
                          <th width="15%">Nama</th>
                          <th width="6%">Tanggal</th>
                          <th width="6%">Jam</th>
                          <th width="20%">Deskripsi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($data as $data)
                      <tr>
                          <td>{{$data->id_petugas}}</td>
                          <td>{{$data->nama}}</td>
                          <td>{{$data->tanggal}}</td>
                          <td>{{$data->jam}}</td>
                          <td>{{$data->deskripsi}}</td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
