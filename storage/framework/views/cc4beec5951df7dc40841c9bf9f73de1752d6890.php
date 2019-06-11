<?php $__env->startSection('isi'); ?>

        <!-- Begin Page Content -->
        <div class="container">
            <div class="row">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Data Member | Klik for Details</h1>
            </div>
            <div class="row justify-content-center">
                <?php if(\Session::has('successalert')): ?>
                    <div class="alert alert-success text-center">
                        <strong> Success! </strong> <?php echo e(Session::get('successalert')); ?>

                    </div>
                    <?php elseif(\Session::has('alert')): ?>
                        <div class="alert alert-danger text-center">
                            <strong> Warning! </strong> <?php echo e(Session::get('alert')); ?>

                        </div>
                <?php endif; ?>

          <table id="pegawai" class="display text-center nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>ID Member</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telepon</th>
                          <th>Saldo</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>

                  <tfoot>
                      <tr>
                          <th>ID Member</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telepon</th>
                          <th>Saldo</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>

                  <tbody>
                    <?php $__currentLoopData = $listM; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listM): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($listM->id_member); ?></td>
                          <td><a href="<?php echo e(url('/detail_member')); ?>/<?php echo e($listM->id_member); ?>"> <?php echo e($listM->nama); ?></a></td>
                          <td><?php echo e($listM->email); ?></td>
                          <td><?php echo e($listM->no_tlfn); ?></td>
                          <td>Rp.<?php echo e($listM->saldo); ?></td>
                          <?php if($hakakses=='admin'): ?>
                            <td><a href="<?php echo e(url('/edit_member')); ?>/<?php echo e($listM->id_member); ?>"><i class="fas fa-user-edit text-red" style="color:green;font-size:20px;"></i></a> &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo e(url('/delete_member')); ?>/<?php echo e($listM->id_member); ?>" onclick="return confirm('Are You Sure Delete <?php echo e($listM->nama); ?> ?')"><i class="fas fa-trash-alt" style="color:red;font-size:20px;"></i></a>
                            </td>
                          <?php else: ?>
                          <td></td>
                          <?php endif; ?>
                      </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>

    </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/data_member.blade.php ENDPATH**/ ?>