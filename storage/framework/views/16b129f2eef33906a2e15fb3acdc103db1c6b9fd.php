<?php $__env->startSection('isi'); ?>
	<?php $__currentLoopData = $tbl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row" style="margin: 3% 0% 5% 4%">
			<div class="col-md-12">
				<h2 class="text-success">Profile</h2>
				<hr>
			</div>
			<div class="col-md-3">
				<img src="#" alt="Images">
			</div>
			<form method="post" class="col-md-7" action="<?php echo e(url('/saveProfile')); ?>">
			<?php echo e(csrf_field()); ?>

				<div class="col-md-12">
					<?php if($t->hakakses == "admin"): ?>
					<div class="form-group">
						<label>NIK</label>
						<input type="text" class="form-control" value="<?php echo e($t->nik); ?>" disabled="">
						<input type="hidden" name="id_petugas" value="<?php echo e($t->id_petugas); ?>">
						<input type="hidden" name="nik" value="<?php echo e($t->nik); ?>">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo e($t->nama); ?>" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo e($t->email); ?>" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
	                        <option selected hidden value="<?php echo e($t->s); ?>"><?php echo e(ucfirst($t->s)); ?></option>
							<option value="single">Single</option>
							<option value="menikah">Menikah</option>
						</select>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
	                        <option selected hidden value="<?php echo e($t->jk); ?>">
	                        	<?php if($t->jk == "P"): ?>
	                        		Perempuan
	                        	<?php elseif($t->jk == "L"): ?>
	                        		Laki-laki
	                        	<?php endif; ?>
	                        </option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<select class="form-control" name="agama" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
	                        <option selected hidden value="<?php echo e($t->agama); ?>"><?php echo e(ucfirst($t->agama)); ?></option>
							<option value="islam">Islam</option>
							<option value="kristen">Kristen</option>
							<option value="hindu">Hindu</option>
							<option value="buddha">Buddha</option>
							<option value="konghucu">Konghucu</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat" value="<?php echo e($t->alamat); ?>" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>><?php echo e($t->alamat); ?></textarea>
					</div>
					<div class="form-group">
						<label>No. Telepon</label>
						<input type="text" name="no_tlfn" class="form-control" value="<?php echo e($t->no_tlfn); ?>" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
					</div>
					<div class="form-group">
						<label>Jumlah Anak</label>
						<input type="number" name="jumlah_anak" class="form-control" value="<?php echo e($t->jumlah_anak); ?>" <?php if($aksi == "view"): ?> disabled="" <?php endif; ?>>
					</div>
					<?php elseif($t->hakakses == "karyawan"): ?>
					<div class="form-group">
						<label>Password Lama</label>
						<input type="password" name="password_lama" class="form-control" <?php if($aksi == "view"): ?> value="<?php echo e($t->password); ?>" disabled=""<?php endif; ?>>
					</div>
						<?php if($aksi == "edit"): ?>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru1" class="form-control">
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru2" class="form-control">
						</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if($aksi == "view"): ?>
						<div class="form-group">
							<a href="<?php echo e(url('/profile/edit')); ?>" class="btn btn-warning">Edit</a>
						</div>
					<?php elseif($aksi == "edit"): ?>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					<?php endif; ?>
				</div>
			</form>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('temamenuheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\syspark\resources\views/profileView.blade.php ENDPATH**/ ?>