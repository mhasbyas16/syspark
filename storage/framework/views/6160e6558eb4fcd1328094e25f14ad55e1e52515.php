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
  <link href="<?php echo e(url('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo e(url('css/sb-admin-2.min.css')); ?>" rel="stylesheet">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo e(url('js/pict.js')); ?>"></script>
  <link href="<?php echo e(url('css/pict.css')); ?>" rel="stylesheet">
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
                <h1 class="h4 text-gray-900 mb-4">Tambah Member!</h1>
              </div>

              <?php if(\Session::has('alert')): ?>
                  <div class="alert alert-danger text-center">
                      <strong> Warning! </strong> <?php echo e(Session::get('alert')); ?>

                  </div>
              <?php endif; ?>

              <form class="user" method="post" action="<?php echo e(url('/simpan_petugas')); ?>" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="first_name" placeholder="First Name" autofocus required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="last_name" placeholder="Last Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nik" placeholder="NIK" maxlength="16" required>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="no_tlfn" placeholder="Nomor Telefon" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="jk" required>
                            <option selected hidden disabled value="L">Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="agama" required>
                            <option selected hidden disabled value="-">Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Kristen katolik">Kristen katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value=">Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">Alamat :</label>
                    <textarea class="form-control" rows="2" name="alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label for="#">Saldo :</label>
                    <input type="text" class="form-control form-control-user" name="saldo" placeholder="Saldo" value="0" required>
                </div>

                <hr>
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Data Kendaraan</h1>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="jk" value=" " required>
                            <option selected hidden disabled value=" ">Jenis Kendaraan</option>
                            <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($jenis->id_jenisk); ?>"><?php echo e($jenis->jenis_k); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="nama_kendaraan" placeholder="Nama Kendaraan ex Mio" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="#">No Plat :</label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 mb-2 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="no_plat1" pattern="[A-Z]+" maxlength="1" value="B" required>
                    </div>
                    <div class="col-sm-5 mb-5 mb-sm-0">
                        <input type="text" class="form-control form-control-user text-center" name="no_plat2" pattern="[0-9]+" maxlength="4" required>
                    </div>
                    <div class="col-sm-5 mb-5 mb-sm-0">
                        <input type="text" class="form-control form-control-user text-center" name="no_plat3" pattern="[A-Z]+" maxlength="4" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="tahun_kendaraan" placeholder="Tahun Kendaraan" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="no_rangka" placeholder="Nomor Rangka" required>
                    </div>
                </div>
                <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input required type="file" id="imgInp" value=" " name="pict">
                                </span>
                            </span>
                            <input type="text" class="form-control" name="Npict" readonly>
                        </div>
                        <img id='img-upload' />
                    </div>
                </div>
            </div>
                <?php if($hakakses=='admin'): ?>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                <?php elseif($hakakses=='karyawan'): ?>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account" disabled>
                <?php endif; ?>
                <hr>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo e(url('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(url('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo e(url('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo e(url('js/sb-admin-2.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\syspark\resources\views/tambah_member.blade.php ENDPATH**/ ?>