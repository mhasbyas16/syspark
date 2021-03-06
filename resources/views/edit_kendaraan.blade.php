<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SYSPARK</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" language="javascript" src="{{url('js/pict.js')}}"></script>
  <link href="{{url('css/pict.css')}}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<style media="screen">


</style>


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tambah Kendaraan!</h1>
              </div>

              @if (\Session::has('alert'))
                  <div class="alert alert-danger text-center">
                      <strong> Warning! </strong> {{Session::get('alert')}}
                  </div>
              @endif

              <form class="user" method="post" action="{{url('/simpan_edit_kendaraan')}}">
                  {{csrf_field()}}
                <div class="form-group row">
                  <div class="col-sm-8 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="merk" value="{{$isi->merk_k}}" autofocus required>
                    <input type="text" class="form-control form-control-user" name="id_jenisk" value="{{$isi->id_jenisk}}" hidden>
                  </div>
                  <div class="col-sm-4">
                    <label for="#">EX : yamaha, honda</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-8 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" pattern="[a-z].{3,}" name="jenis" value="{{$isi->jenis_k}}" title="huruf kecil semua"  required>
                  </div>
                  <div class="col-sm-4">
                    <label for="#">EX : motor, mobil, truk</label>
                  </div>
                </div>
                @if($hakakses=='admin')
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Edit">
                @elseif($hakakses=='karyawan')
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Edit" disabled>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
