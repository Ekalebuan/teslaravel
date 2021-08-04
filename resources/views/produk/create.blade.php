@extends('layout.main')

@section('title', 'Data Produk')

@section('isi')

<div class="container">
	
	<h1>Tambah Data Produk</h1>
	<div class="mt-3">
		<form action="/produk" method="post">
			@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="mb-3">
					  <label for="kode_produk" class="form-label">Kode Produk</label>
					  <input type="text" class="form-control" name="kode_produk" id="kode_produk" placeholder="" value="{{$kode}}" readonly>
					</div>
				</div>

				<div class="col-md-4">
					<div class="mb-3">
					  <label for="nama_produk" class="form-label">Nama Produk</label>
					  <input type="text" class="form-control @error ('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" placeholder="Input nama produk" value="{{ old('nama_produk') }}">
					  @error ('nama_produk') 
				    	<div class="invalid-feedback">
				       		{{ $message }}
				      	</div>
				      @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="mb-3">
					  <label for="harga" class="form-label">Harga Satuan</label>
					  <input type="number" class="form-control @error ('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Input harga satuan" value="{{ old('harga') }}">
					  @error ('harga') 
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