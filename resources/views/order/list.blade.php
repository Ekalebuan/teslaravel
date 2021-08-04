@extends('layout.main')

@section('title', 'Data Transaksi')

@section('isi')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="mt-3">
				<h1>Data Transaksi</h1>
				
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
					      <th scope="col">Tanggal</th>
					      <th scope="col">Kode Struk</th>
					      <th scope="col">Customer</th>
					      <th scope="col">No. Hp</th>
					      <th scope="col">GrandTotal</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach ($order as $order)
						    <tr>
						      <th scope="row">{{ $loop->iteration }}</th>
						      <td>{{$order->tanggal}}</td>
						      <td>{{$order->kode_struk}}</td>
						      <td>{{$order->nama_customer}}</td>
						      <td>{{$order->no_handphone}}</td>
						      <td>{{$order->grandtotal}}</td>
						      <td>
						      	<a href="/order/{{ $order->kode_struk }}" class="btn btn-sm btn-info" title="">Detail</a>
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