@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ID Petugas : {{$data->id_petugas}} </h1>

          <div class="row">
              <div class="col-sm-8 col-xs-8"> <table>
                   <tr>
                       <td>Nama</td>
                       <td>:</td>
                       <td>{{$data->nama}}</td>
                   </tr>
                   <tr>
                       <td>NIK</td>
                       <td>:</td>
                       <td>{{$data->nik}}</td>
                   </tr>
                   <tr>
                       <td>Status Pernikahan</td>
                       <td>:</td>
                       <td>{{$data->status}}</td>
                   </tr>
                   <tr>
                       <td>Jumlah Anak</td>
                       <td>:</td>
                       <td>{{$data->jumlah_anak}}</td>
                   </tr>
                   <tr>
                       <td>Email</td>
                       <td>:</td>
                       <td>{{$data->email}}</td>
                   </tr>
                   <tr>
                       <td>Jenis Kelamin</td>
                       <td>:</td>
                       <td>{{$data->jk}}</td>
                   </tr>
                   <tr>
                       <td>Agama</td>
                       <td>:</td>
                       <td>{{$data->agama}}</td>
                   </tr>
                   <tr>
                       <td>Alamat</td>
                       <td>:</td>
                       <td>{{$data->alamat}}</td>
                   </tr>
                   <tr>
                       <td>Nomor Telefon</td>
                       <td>:</td>
                       <td>{{$data->no_tlfn}}</td>
                   </tr>
                   <tr>
                       <td>Photo</td>
                       <td>:</td>
                       <td>{{$data->pict}}</td>
                   </tr>
               </table></div>
              <div class="col-sm-4 col-xs-4">
                   <h5 class="h3 mb-4 text-gray-800">History Account </h5>
                   <div class="overflow-auto">
                       <table class="display text-center" border="1" width='100%'>
                           <tr>
                               <th>Tanggal</th>
                               <th>jam</th>
                               <th>Deskripsi</th>
                           </tr>
                        @foreach ($log as $log)
                           <tr>
                               <td>{{$log->tanggal}}</td>
                               <td>{{$log->jam}}</td>
                               <td>{{$log->deskripsi}}</td>
                           </tr>
                         @endforeach
                       </table>
                   </div>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection
