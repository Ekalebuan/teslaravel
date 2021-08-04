@extends('layout.main')

@section('title', 'Tambah Customer')

@section('isi')

<div class="container">
	
	<h1>Tambah Data Customer</h1>
	<div class="mt-3">
		<form action="/customer" method="post">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="mb-3">
					  <label for="no_handphone" class="form-label">No Handphone</label>
					  <input type="text" class="form-control @error ('no_handphone') is-invalid @enderror" name="no_handphone" id="no_handphone" placeholder="Input nomor handphone" value="{{ old('no_handphone') }}" >
					  @error ('no_handphone') 
				    	<div class="invalid-feedback">
				       		{{ $message }}
				      	</div>
				      @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="mb-3">
					  <label for="nama_customer" class="form-label">Nama Customer</label>
					  <input type="text" class="form-control @error ('nama_customer') is-invalid @enderror" name="nama_customer" id="nama_customer" placeholder="Input nama customer" value="{{ old('nama_customer') }}">
					  @error ('nama_customer') 
				    	<div class="invalid-feedback">
				       		{{ $message }}
				      	</div>
				      @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="mb-3">
					  <label for="alamat" class="form-label">Alamat</label>
					  <input type="text" class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Input alamat" value="{{ old('alamat') }}">
					  @error ('alamat') 
				    	<div class="invalid-feedback">
				       		{{ $message }}
				      	</div>
				      @enderror
					</div>
				</div>

				<div class="col-md-12">
					<button type="submit" class="btn btn-sm btn-success">Simpan</button>
				</div>

			</div>
		</form>
	</div>
</div>

@endsection