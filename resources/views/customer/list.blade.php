@extends('layout.main')

@section('title', 'Data Customer')

@section('isi')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="mt-3">
				<h1>Data Customer</h1>
				<p>
  					<a href="{{ url('customer/create') }}" title="" class="btn btn-sm btn-primary">Tambah Data Customer</a>
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
					      <th scope="col">No Handphone</th>
					      <th scope="col">Nama</th>
					      <th scope="col">Alamat</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($customer as $customer)
						    <tr>
						      <th scope="row">{{ $loop->iteration }}</th>
						      <td>{{$customer->no_handphone}}</td>
						      <td>{{$customer->nama_customer}}</td>
						      <td>{{$customer->alamat}}</td>
						      <td>
						      	<a href="customer/{{ $customer->id_customer }}/edit" class="btn btn-sm btn-warning" title="">Edit</a>
						      	@include('customer.delete')
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