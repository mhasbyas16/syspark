@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Biaya | <a href="{{url('/tambah_biaya')}}">Tambah Biaya Kendaraan</a></h1>
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
                          <th>Kendaraan</th>
                          <th>Menit Gratis</th>
                          <th>Jam Pertama</th>
                          <th>Biaya Pertama</th>
                          <th>Jam Berikutnya</th>
                          <th>Biaya Berikutnya</th>
                          <th>Tipe</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>Kendaraan</th>
                          <th>Menit Gratis</th>
                          <th>Jam Pertama</th>
                          <th>Biaya Pertama</th>
                          <th>Jam Berikutnya</th>
                          <th>Biaya Berikutnya</th>
                          <th>Tipe</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>
                      @foreach($biaya as $biaya)
                        <tr>
                            <td>{{$biaya->jenis_k}}</td>
                            <td>{{$biaya->menit_g}}</td>
                            <td>{{$biaya->jam_p}}</td>
                            <td>Rp. {{$biaya->biaya_p}}</td>
                            <td>{{$biaya->jam_b}}</td>
                            <td>Rp. {{$biaya->biaya_b}}</td>
                            <td>{{$biaya->tipe}}</td>
                      @if($hakakses=='admin')
                            <td><a href="{{url('/edit_biaya')}}/{{$biaya->id_biaya}}/{{$biaya->id_jenisk}}"><i class="fas fa-edit" style="color:green;font-size:20px;"></i></a> &nbsp;&nbsp;&nbsp;
                               <a href="{{url('/delete_biaya')}}/{{$biaya->id_biaya}}" onclick="return confirm('Apakah Kamu Yakin Mengahapus Data Ini ?')"><i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></a>
                            </td>
                      @else
                            <td></td>
                      @endif
                        </tr>
                  @endforeach
                  <tbody>

                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
