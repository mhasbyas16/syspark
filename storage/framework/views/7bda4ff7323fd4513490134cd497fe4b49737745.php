<?php $__env->startSection('isi'); ?>

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800" align="center">History Log</h1>
            </div>
            <div class="row justify-content-center">
                <?php if(\Session::has('successalert')): ?>
                    <div class="alert alert-success text-center">
                        <strong> Success! </strong> <?php echo e(Session::get('successalert')); ?>

                    </div>
                    <?php elseif(\Session::has('alert')): ?>
                        <div class="alert alert-danger text-center">
                            <strong> Success! </strong> <?php echo e(Session::get('alert')); ?>

                        </div>
                <?php endif; ?>

          <table id="pegawai" class="display text-center nowrap" cellspacing="0" width="100%" border="1" >
                  <thead>
                      <tr>
                          <th width="5%">ID Petugas</th>
                          <th width="15%">Nama</th>
                          <th width="6%">Tanggal</th>
                          <th width="6%">Jam</th>
                          <th width="20%">Deskripsi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th width="5%">ID Petugas</th>
                          <th width="15%">Nama</th>
                          <th width="6%">Tanggal</th>
                          <th width="6%">Jam</th>
                          <th width="20%">Deskripsi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($data->id_petugas); ?></td>
                          <td><?php echo e($data->nama); ?></td>
                          <td><?php echo e($data->tanggal); ?></td>
                          <td><?php echo e($data->jam); ?></td>
                          <td><?php echo e($data->deskripsi); ?></td>
                      </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/loghistory.blade.php ENDPATH**/ ?>