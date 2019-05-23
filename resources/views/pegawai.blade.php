@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Employee | Klik for Details</h1>
            </div>
            <div class="row justify-content-center">

          <table id="pegawai" class="display text-center nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Petugas</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Petugas</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>No Telepon</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($listP as $listP)
                      <tr>
                          <td>{{$listP->id_petugas}}</td>
                          <td><a href="{{url('/detail_petugas')}}/{{$listP->id_petugas}}"> {{$listP->nama}}</a></td>
                          <td>{{$listP->email}}</td>
                          <td>{{$listP->alamat}}</td>
                          <td>{{$listP->no_tlfn}}</td>
                          <td><i class="fas fa-user-edit text-red" style="color:green;font-size:20px;"></i> &nbsp;&nbsp;&nbsp;
                              <i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
