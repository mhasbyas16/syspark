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
                <h1 class="h4 text-gray-900 mb-4">Edit an Account!</h1>
              </div>

              <?php if(\Session::has('alert')): ?>
                  <div class="alert alert-danger text-center">
                      <strong> Warning! </strong> <?php echo e(Session::get('alert')); ?>

                  </div>
              <?php endif; ?>

              <form class="user" method="post" action="<?php echo e(url('/simpan_edit_petugas')); ?>" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="id" value="<?php echo e($cariD->id_petugas); ?>" readonly>
                </div>
                <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="name" value="<?php echo e($cariD->nama); ?>" autofocus required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nik" value="<?php echo e($cariD->nik); ?>" maxlength="16" required>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" value="<?php echo e($cariD->email); ?>" required>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="status" required>
                            <option selected hidden value="<?php echo e($cariD->status); ?>"><?php echo e($cariD->status); ?></option>
                            <option value="single">Single</option>
                            <option value="menikah">Menikah</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="jumlah_anak" value="<?php echo e($cariD->jumlah_anak); ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="jk" required>
                            <option selected hidden value="<?php echo e($cariD->jk); ?>">
                                <?php if($cariD->jk=='L'): ?>
                                    Laki-Laki
                                <?php else: ?>
                                    Perempuan
                                <?php endif; ?></option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="agama" required>
                            <option selected hidden value="<?php echo e($cariD->agama); ?>"><?php echo e($cariD->agama); ?></option>
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
                    <textarea class="form-control" rows="2" name="alamat" required><?php echo e($cariD->alamat); ?></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="no_tlfn" value="<?php echo e($cariD->no_tlfn); ?>" required>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" name="hakakses" required>
                            <option selected hidden value="<?php echo e($cariD->hakakses); ?>">
                            <?php if($cariD->hakakses=='admin'): ?>
                                Admin
                            <?php else: ?>
                                Karyawan
                            <?php endif; ?></option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="imgInp" name="pict">
                                </span>
                            </span>
                            <input type="text" class="form-control" name="Tpict" readonly>
                        </div>
                        <img id='img-upload' src="<?php echo e(asset('image/foto_petugas')); ?>/<?php echo e($cariD->pict); ?>" />
                    </div>
                </div>
            </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Edit Account">
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
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
<?php /**PATH C:\xampp\htdocs\syspark\resources\views/edit_petugas.blade.php ENDPATH**/ ?>