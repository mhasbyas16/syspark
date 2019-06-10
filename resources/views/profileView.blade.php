@extends('temamenuheader')
@section('isi')
	@foreach ($tbl as $t)
		<div class="row" style="margin: 3% 0% 5% 4%">
			<div class="col-md-12">
				<h2 class="text-success">Profile</h2>
				<hr>
			</div>
			<div class="col-md-3">
				<img src="#" alt="Images">
			</div>
			<form method="post" class="col-md-7" action="{{ url('/saveProfile') }}">
			{{csrf_field()}}
				<div class="col-md-12">
					@if ($t->hakakses == "admin")
					<div class="form-group">
						<label>NIK</label>
						<input type="text" class="form-control" value="{{ $t->nik }}" disabled="">
						<input type="hidden" name="id_petugas" value="{{ $t->id_petugas }}">
						<input type="hidden" name="nik" value="{{ $t->nik }}">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="{{ $t->nama }}" @if ($aksi == "view") disabled="" @endif>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="{{ $t->email }}" @if ($aksi == "view") disabled="" @endif>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" @if ($aksi == "view") disabled="" @endif>
	                        <option selected hidden value="{{$t->s}}">{{ucfirst($t->s)}}</option>
							<option value="single">Single</option>
							<option value="menikah">Menikah</option>
						</select>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jk" @if ($aksi == "view") disabled="" @endif>
	                        <option selected hidden value="{{$t->jk}}">
	                        	@if ($t->jk == "P")
	                        		Perempuan
	                        	@elseif ($t->jk == "L")
	                        		Laki-laki
	                        	@endif
	                        </option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Agama</label>
						<select class="form-control" name="agama" @if ($aksi == "view") disabled="" @endif>
	                        <option selected hidden value="{{$t->agama}}">{{ucfirst($t->agama)}}</option>
							<option value=islam">Islam</option>
							<option value="kristen">Kristen</option>
							<option value="hindu">Hindu</option>
							<option value="buddha">Buddha</option>
							<option value="konghucu">Konghucu</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" value="{{ $t->alamat }}" @if ($aksi == "view") disabled="" @endif>{{ $t->alamat }}</textarea>
					</div>
					<div class="form-group">
						<label>No. Telepon</label>
						<input type="text" name="no_tlfn" class="form-control" value="{{ $t->no_tlfn }}" @if ($aksi == "view") disabled="" @endif>
					</div>
					<div class="form-group">
						<label>Jumlah Anak</label>
						<input type="number" name="jumlah_anak" class="form-control" value="{{ $t->jumlah_anak }}" @if ($aksi == "view") disabled="" @endif>
					</div>
					@elseif($t->hakakses == "karyawan")
					<div class="form-group">
						<label>Password Lama</label>
						<input type="password" name="password_lama" class="form-control" @if ($aksi == "view") value="{{ $t->password }}" disabled=""@endif>
					</div>
						@if ($aksi == "edit") 
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru1" class="form-control">
						</div>
						<div class="form-group">
							<label>Password Baru</label>
							<input type="password" name="password_baru2" class="form-control">
						</div>
						@endif
					@endif
					@if($aksi == "view")
						<div class="form-group">
							<a href="{{ url('/profile/edit') }}" class="btn btn-warning">Edit</a>
						</div>
					@elseif($aksi == "edit")
						<div class="form-group">
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					@endif
				</div>
			</form>
		</div>
	@endforeach
@endsection