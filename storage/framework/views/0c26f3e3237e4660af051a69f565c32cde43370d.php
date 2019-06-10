<?php $__env->startSection('isi'); ?>

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
            </div>
            <div class="row justify-content-center">

          <table id="pegawai" class="display text-center" cellspacing="0" width="100%">
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
                    <?php $__currentLoopData = $listP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($listP->id_petugas); ?></td>
                          <td><?php echo e($listP->nama); ?></td>
                          <td><?php echo e($listP->nik); ?></td>
                          <td><?php echo e($listP->jk); ?></td>
                          <td><?php echo e($listP->agama); ?></td>
                          <td><?php echo e($listP->alamat); ?></td>
                          <td><?php echo e($listP->no_tlfn); ?></td>
                          <td><?php echo e($listP->pict); ?></td>
                      </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/pegawai.blade.php ENDPATH**/ ?>