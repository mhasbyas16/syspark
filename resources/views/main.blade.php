@extends('temamenuheader')
@section('isi')

        <!-- Begin Page Content -->
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-in-tab" data-toggle="tab" href="#nav-in" role="tab" aria-controls="nav-in" aria-selected="true">In</a>
            <a class="nav-item nav-link" id="nav-out-tab" data-toggle="tab" href="#nav-out" role="tab" aria-controls="nav-out" aria-selected="false">Out</a>
            <a class="nav-item nav-link" id="nav-transaction-tab" data-toggle="tab" href="#nav-transaction" role="tab" aria-controls="nav-transaction" aria-selected="false">Data Transaction</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-in" role="tabpanel" aria-labelledby="nav-in-tab">
            <form method="post" class="form-inline" action="{{ url('/park')}}">
              {{csrf_field()}}
              <input type="hidden" name="action" class="col-md-11" value="in">
              <input type="hidden" name="id" class="col-md-11" value="@if($id > 0) {{ $id +1 }} @else 1 @endif">
              <div class="col-md-5 pt-4 pl-4">
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Parkir
                  </div>
                  <div class="col-md-8">
                    : @if($id_parkir > 0) {{ $id_parkir +1 }} @else 1 @endif
                    <input type="hidden" name="id_parkir" class="col-md-11" value="@if($id_parkir > 0) {{ $id_parkir +1 }} @else 1 @endif">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Tanggal
                  </div>
                  <div class="col-md-8">
                    : {{date('d-m-Y')}}
                    <input type="hidden" name="tanggal" class="col-md-11" value="{{date('d-m-Y')}}">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Jam
                  </div>
                  <div class="col-md-8">
                    : {{date('H:i:s')}}
                    <input type="hidden" name="jam" class="col-md-11" value="{{date('H:i:s')}}">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    No. Plat
                  </div>
                  <div class="col-md-8">
                    : <input type="text" name="no_plat" class="col-md-11">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Jenis Kendaraan
                  </div>
                  <div class="col-md-8">
                    : 
                    <select name="id_jenisk" class="col-md-11 text-capitalize">
                      @foreach ($tbl4 as $t4)
                        <option value="{{ $t4->id_jenisk }}">{{ $t4->jenis_k }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-5 pt-4">
                <div class="col-md-12"  style="height: 220px">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Upload Image</label>
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="imgInp" name="pict">
                                  </span>
                              </span>
                              <input type="text" class="form-control" name="Npict" readonly>
                          </div>
                          <img id='img-upload' />
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" name="submit" value="Masuk" class="btn btn-primary col-md-12">
              </div>
            </form>

            <div class="col-md-12 mt-5">
              <table id="masuk" class="display text-center" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Parkir</th>
                          <th>Tanggal</th>
                          <th>Jam Masuk</th>
                          <th>Foto</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Parkir</th>
                          <th>Tanggal</th>
                          <th>Jam Masuk</th>
                          <th>Foto</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($tbl as $t)
                      <tr>
                          <td>{{$t->id_parkir}}</td>
                          <td>{{$t->tanggal_masuk}}</td>
                          <td>{{$t->jam_masuk}}</td>
                          <td>{{$t->foto}}</td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-out" role="tabpanel" aria-labelledby="nav-out-tab">
            <form method="post" class="form-inline"action="{{ url('park') }}">
              <input type="hidden" name="action" class="col-md-11" value="out">
              <div class="col-md-6 pt-4 pl-4">
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Tanggal
                  </div>
                  <div class="col-md-8">
                    : {{date('d-m-Y')}}
                    <input type="hidden" name="tanggal" class="col-md-11" value="{{date('d-m-Y')}}">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Jam
                  </div>
                  <div class="col-md-8">
                    : {{date('H:i:s')}}
                    <input type="hidden" name="jam" class="col-md-11" value="{{date('H:i:s')}}">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Operator
                  </div>
                  <div class="col-md-8">
                    : {{Session::get('id_petugas')}}
                    <input type="hidden" name="id_petugas" class="col-md-11" disabled="" value="{{Session::get('id_petugas')}}">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Parkir
                  </div>
                  <div class="col-md-8">
                    : <input type="text" name="id_parkir" class="col-md-11">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    No. Plat
                  </div>
                  <div class="col-md-8">
                    : <input type="text" name="no_plat" class="col-md-11">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Member
                  </div>
                  <div class="col-md-8">
                    : <input type="text" name="id_member" class="col-md-11">
                  </div>
                </div>
              </div>
              <div class="col-md-5 pt-4">
                <div class="col-md-12"  style="height: 220px">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Upload Image</label>
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="imgInp" name="pict">
                                  </span>
                              </span>
                              <input type="text" class="form-control" name="Npict" readonly>
                          </div>
                          <img id='img-upload' />
                      </div>
                  </div>
                </div>
                <div class="col-md-12">
                  Rp. -
                </div>
              </div>
              <div class="col-md-6">
                <input type="button" name="action" value="Proses" class="btn btn-success col-md-12">
              </div>
              <div class="col-md-6">
                <input type="submit" name="action" value="Keluar" class="btn btn-primary col-md-12">
              </div>
            </form>

            <div class="col-md-12 mt-5">
              <table id="keluar" class="display text-center" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Parkir</th>
                          <th>Tanggal</th>
                          <th>Jam Keluar</th>
                          <th>Foto</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Parkir</th>
                          <th>Tanggal</th>
                          <th>Jam Keluar</th>
                          <th>Foto</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    @foreach($tbl as $t)
                      <tr>
                          <td>{{$t->id_parkir}}</td>
                          <td>{{$t->tanggal_masuk}}</td>
                          <td>{{$t->jam_masuk}}</td>
                          <td>{{$t->foto}}</td>
                      </tr>
                     @endforeach
                  </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-transaction" role="tabpanel" aria-labelledby="nav-transaction-tab">
            <div class="col-md-12 mt-3">
              <table id="transakiParkir" class="display text-center" cellspacing="0" width="100%">
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
                  @foreach($tbl2 as $t2)
                    <tr>
                        <td>{{$t2->id_petugas}}</td>
                        <td>{{$t2->nama}}</td>
                        <td>{{$t2->nik}}</td>
                        <td>{{$t2->jk}}</td>
                        <td>{{$t2->agama}}</td>
                        <td>{{$t2->alamat}}</td>
                        <td>{{$t2->no_tlfn}}</td>
                        <td>{{$t2->pict}}</td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@endsection
