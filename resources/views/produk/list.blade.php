@extends('layout.main')

@section('title', 'Data Produk')

@section('isi')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="mt-3">
				<h1>Data Produk</h1>
				<p>
  					<a href="{{ url('produk/create') }}" title="" class="btn btn-sm btn-primary">Tambah Data produk</a>
  				</p>
  				@if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@endif
				<div class="table-responsive">
					<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Kode</th>
					      <th scope="col">Produk</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($produk as $produk)
						    <tr>
						      <th scope="row">{{ $loop->iteration }}</th>
						      <td>{{$produk->kode_produk}}</td>
						      <td>{{$produk->nama_produk}}</td>
						      <td>{{$produk->harga}}</td>
						      <td>
						      	<a href="produk/{{ $produk->kode_produk }}/edit" class="btn btn-sm btn-warning" title="">Edit</a>
						      	@include('produk.delete')
						      </td>
						    </tr>
					    @endforeach
					    
					  </tbody>
					</table>
				</div>	
			</div>
		</div>
	</div>
</div>

@endsection