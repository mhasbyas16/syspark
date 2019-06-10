<?php $__env->startSection('isi'); ?>

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
            <form method="post" class="form-inline" action="<?php echo e(url('/park')); ?>">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="action" class="col-md-11" value="in">
              <input type="hidden" name="id" class="col-md-11" value="<?php if($id > 0): ?> <?php echo e($id +1); ?> <?php else: ?> 1 <?php endif; ?>">
              <div class="col-md-5 pt-4 pl-4">
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Parkir
                  </div>
                  <div class="col-md-8">
                    : <?php if($id_parkir > 0): ?> <?php echo e($id_parkir +1); ?> <?php else: ?> 1 <?php endif; ?>
                    <input type="hidden" name="id_parkir" class="col-md-11" value="<?php if($id_parkir > 0): ?> <?php echo e($id_parkir +1); ?> <?php else: ?> 1 <?php endif; ?>">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Tanggal
                  </div>
                  <div class="col-md-8">
                    : <?php echo e(date('d-m-Y')); ?>

                    <input type="hidden" name="tanggal" class="col-md-11" value="<?php echo e(date('d-m-Y')); ?>">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Jam
                  </div>
                  <div class="col-md-8">
                    : <?php echo e(date('H:i:s')); ?>

                    <input type="hidden" name="jam" class="col-md-11" value="<?php echo e(date('H:i:s')); ?>">
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
                      <?php $__currentLoopData = $tbl4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t4->id_jenisk); ?>"><?php echo e($t4->jenis_k); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = $tbl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($t->id_parkir); ?></td>
                          <td><?php echo e($t->tanggal_masuk); ?></td>
                          <td><?php echo e($t->jam_masuk); ?></td>
                          <td><?php echo e($t->foto); ?></td>
                      </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-out" role="tabpanel" aria-labelledby="nav-out-tab">
            <form method="post" class="form-inline"action="<?php echo e(url('park')); ?>">
              <input type="hidden" name="action" class="col-md-11" value="out">
              <div class="col-md-6 pt-4 pl-4">
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Tanggal
                  </div>
                  <div class="col-md-8">
                    : <?php echo e(date('d-m-Y')); ?>

                    <input type="hidden" name="tanggal" class="col-md-11" value="<?php echo e(date('d-m-Y')); ?>">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Jam
                  </div>
                  <div class="col-md-8">
                    : <?php echo e(date('H:i:s')); ?>

                    <input type="hidden" name="jam" class="col-md-11" value="<?php echo e(date('H:i:s')); ?>">
                  </div>
                </div>
                <div class="form-group pb-2 form-inline">
                  <div class="col-md-4 text-md-left">
                    Id. Operator
                  </div>
                  <div class="col-md-8">
                    : <?php echo e(Session::get('id_petugas')); ?>

                    <input type="hidden" name="id_petugas" class="col-md-11" disabled="" value="<?php echo e(Session::get('id_petugas')); ?>">
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
                    <?php $__currentLoopData = $tbl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e($t->id_parkir); ?></td>
                          <td><?php echo e($t->tanggal_masuk); ?></td>
                          <td><?php echo e($t->jam_masuk); ?></td>
                          <td><?php echo e($t->foto); ?></td>
                      </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                  <?php $__currentLoopData = $tbl2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($t2->id_petugas); ?></td>
                        <td><?php echo e($t2->nama); ?></td>
                        <td><?php echo e($t2->nik); ?></td>
                        <td><?php echo e($t2->jk); ?></td>
                        <td><?php echo e($t2->agama); ?></td>
                        <td><?php echo e($t2->alamat); ?></td>
                        <td><?php echo e($t2->no_tlfn); ?></td>
                        <td><?php echo e($t2->pict); ?></td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/main.blade.php ENDPATH**/ ?>