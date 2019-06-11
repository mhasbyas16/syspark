@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Member | Klik for Details</h1>
            </div>
            <div class="row justify-content-center">
                @if (\Session::has('successalert'))
                    <div class="alert alert-success text-center">
                        <strong> Success! </strong> {{Session::get('successalert')}}
                    </div>
                    @elseif (\Session::has('alert'))
                        <div class="alert alert-danger text-center">
                            <strong> Warning! </strong> {{Session::get('alert')}}
                        </div>
                @endif

          <table id="pegawai" class="display text-center nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Member</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telepon</th>
                          <th>Saldo</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Member</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telepon</th>
                          <th>Saldo</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($listM as $listM)
                      <tr>
                          <td>{{$listM->id_member}}</td>
                          <td><a href="{{url('/detail_member')}}/{{$listM->id_member}}"> {{$listM->nama}}</a></td>
                          <td>{{$listM->email}}</td>
                          <td>{{$listM->no_tlfn}}</td>
                          <td>Rp.{{$listM->saldo}}</td>
                          @if($hakakses=='admin')
                            <td><a href="{{url('/edit_member')}}/{{$listM->id_member}}"><i class="fas fa-user-edit text-red" style="color:green;font-size:20px;"></i></a> &nbsp;&nbsp;&nbsp;
                                <a href="{{url('/delete_member')}}/{{$listM->id_member}}" onclick="return confirm('Are You Sure Delete {{$listM->nama}} ?')"><i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></a>
                            </td>
                          @else
                          <td></td>
                          @endif
                      </tr>
                     @endforeach
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
