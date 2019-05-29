@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Kendaraan | <a href="{{url('/tambah_kendaraan')}}">Tambah Kendaraan</a></h1>
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
                          <th>ID Kendaraan</th>
                          <th>Merek Kendaraan</th>
                          <th>Jenis Kendaraan</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Kendaraan</th>
                          <th>Merek Kendaraan</th>
                          <th>Jenis Kendaraan</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($data as $data)
                      <tr>
                          <td>{{$data->id_jenisk}}</td>
                          <td>{{$data->merk_k}}</td>
                          <td>{{$data->jenis_k}}</td>
                           @if($hakakses=='admin')
                          <td><a href="{{url('/edit_kendaraan')}}/{{$data->id_jenisk}}"><i class="fas fa-edit" style="color:green;font-size:20px;"></i></a> &nbsp;&nbsp;&nbsp;
                              <a href="{{url('/delete_kendaraan')}}/{{$data->id_jenisk}}" onclick="return confirm('Apakah Kamu Yakin Mengahapus Data ID = {{$data->id_jenisk}} ?')"><i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></a>
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
