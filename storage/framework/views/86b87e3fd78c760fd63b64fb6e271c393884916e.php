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
                <h1 class="h4 text-gray-900 mb-4">Input Biaya Baru !</h1>
              </div>

              <?php if(\Session::has('alert')): ?>
                  <div class="alert alert-danger text-center">
                      <strong> Warning! </strong> <?php echo e(Session::get('alert')); ?>

                  </div>
              <?php endif; ?>

              <form class="user" method="post" action="<?php echo e(url('/simpan_biaya')); ?>">
                  <?php echo e(csrf_field()); ?>

                  <div class="form-group row">
                      <div class="col-sm-4 mb-3 mb-sm-0">
                          <label for="#">Jenis Kendaraan</label>
                      </div>
                      <div class="col-sm-1 mb-3 mb-sm-0">
                          <label for="#">:</label>
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <select class="form-control" name="jenisk" required>
                              <option hidden value="">Pilih Salah Satu</option>
                              <?php $__currentLoopData = $jenisk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($jenisk->id_jenisk); ?>"><?php echo e($jenisk->jenis_k); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Menit Gratis</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="menitg_h" value="0" min="0" max="24" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Jam</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="menitg_m" value="0" min="0" max="59" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Menit</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Biaya Pertama</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Rp.</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="biaya_p" placeholder="Biaya Pertama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Biaya Berikutnya</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Rp.</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="biaya_b" placeholder="Biaya Berikutnya" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Jam Pertama</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="jamp_h" value="0" min="0" max="24" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Jam</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="jamp_m" value="0" min="0" max="59" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Menit</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Jam Berikutnya</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="jamb_h" value="0" min="0" max="24" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Jam</label>
                    </div>
                    <div class="col-sm-2 mb-3 mb-sm-0">
                        <input type="number" class="form-control text-center" maxlength="2" name="jamb_m" value="0" min="0" max="59" required>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">Menit</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="#">Tipe</label>
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="#">:</label>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select class="form-control" name="tipe" required>
                            <option selected value="non">Non Member</option>
                            <option value="member">Member</option>
                        </select>
                    </div>
                </div>
                <?php if($hakakses=='admin'): ?>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah">
                <?php elseif($hakakses=='karyawan'): ?>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" disabled>
                <?php endif; ?>
                <hr>
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
<?php /**PATH C:\xampp\htdocs\syspark\resources\views/tambah_biaya.blade.php ENDPATH**/ ?>