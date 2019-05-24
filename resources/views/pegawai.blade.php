@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Employee | Klik for Details</h1>
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
                          <td><a href="{{url('/edit_petugas')}}/{{$listP->id_petugas}}"><i class="fas fa-user-edit text-red" style="color:green;font-size:20px;"></i></a> &nbsp;&nbsp;&nbsp;
                              <a href="{{url('/delete_petugas')}}/{{$listP->id_petugas}}" onclick="return confirm('Are You Sure Delete {{$listP->nama}} ?')"><i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></td></a>
                      </tr>
                     @endforeach
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
