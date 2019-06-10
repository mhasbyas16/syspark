<?php $__env->startSection('isi'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">ID Petugas : <?php echo e($data->id_petugas); ?> </h1>

          <div class="row">
              <div class="col-sm-8 col-xs-8"> <table>
                   <tr>
                       <td>Nama</td>
                       <td>:</td>
                       <td><?php echo e($data->nama); ?></td>
                   </tr>
                   <tr>
                       <td>NIK</td>
                       <td>:</td>
                       <td><?php echo e($data->nik); ?></td>
                   </tr>
                   <tr>
                       <td>Status Pernikahan</td>
                       <td>:</td>
                       <td><?php echo e($data->status); ?></td>
                   </tr>
                   <tr>
                       <td>Jumlah Anak</td>
                       <td>:</td>
                       <td><?php echo e($data->jumlah_anak); ?></td>
                   </tr>
                   <tr>
                       <td>Email</td>
                       <td>:</td>
                       <td><?php echo e($data->email); ?></td>
                   </tr>
                   <tr>
                       <td>Jenis Kelamin</td>
                       <td>:</td>
                       <td><?php if($data->jk=='L'): ?>
                            Laki-Laki
                           <?php else: ?>
                            Perempuan
                           <?php endif; ?></td>
                   </tr>
                   <tr>
                       <td>Agama</td>
                       <td>:</td>
                       <td><?php echo e($data->agama); ?></td>
                   </tr>
                   <tr>
                       <td>Alamat</td>
                       <td>:</td>
                       <td><?php echo e($data->alamat); ?></td>
                   </tr>
                   <tr>
                       <td>Nomor Telefon</td>
                       <td>:</td>
                       <td><?php echo e($data->no_tlfn); ?></td>
                   </tr>
                   <tr>
                       <td>Photo</td>
                       <td>:</td>
                       <td><img src="<?php echo e(asset('/image/foto_petugas')); ?>/<?php echo e($data->pict); ?>"  class="img-responsive img-rounded" width="304" height="236" alt="<?php echo e($data->pict); ?>"></td>
                   </tr>
               </table></div>
              <div class="col-sm-4 col-xs-4">
                   <h5 class="h3 mb-4 text-gray-800">History Account </h5>
                   <div id="overflowTest">
                       <table class="display text-center" border="1" width='100%'>
                           <tr>
                               <th>Tanggal</th>
                               <th>jam</th>
                               <th>Deskripsi</th>
                           </tr>
                        <?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                               <td><?php echo e($log->tanggal); ?></td>
                               <td><?php echo e($log->jam); ?></td>
                               <td><?php echo e($log->deskripsi); ?></td>
                           </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </table>
                   </div>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/detail_petugas.blade.php ENDPATH**/ ?>