@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
            </div>
            <div class="row justify-content-center">

          <table id="pegawai" class="display text-center" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Petugas</th>
                          <th>Nama</th>
                          <th>NIK</th>
                          <th>Gender</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>Foto</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Petugas</th>
                          <th>Nama</th>
                          <th>NIK</th>
                          <th>Gender</th>
                          <th>Agama</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>Foto</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($listP as $listP)
                      <tr>
                          <td>{{$listP->id_petugas}}</td>
                          <td>{{$listP->nama}}</td>
                          <td>{{$listP->nik}}</td>
                          <td>{{$listP->jk}}</td>
                          <td>{{$listP->agama}}</td>
                          <td>{{$listP->alamat}}</td>
                          <td>{{$listP->no_tlfn}}</td>
                          <td>{{$listP->pict}}</td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
