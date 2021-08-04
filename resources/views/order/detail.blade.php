@extends('layout.main')

@section('title', 'POS - Dashboard')

@section('isi')

<div class="container">
	<h5 class="mt-3">Detail Struk Order</h5>
	<div class="row">
		<div class="col-md-12">
			

			<div class="row">
				<div class="col-lg-8">
					

					<div class="mt-3">
						<div class="table-responsive">
							<table class="table">
							  <thead class="thead-dark">
							    <tr>
							    	<th scope="col" class="text-center">No</th>
							      	<th scope="col" class="text-center">Kode Produk</th>
							      	<th scope="col" class="text-center">Produk</th>
							      	<th scope="col" class="text-center">Harga</th>
							      	<th scope="col" class="text-center">Quantity</th>
							      	<th scope="col" class="text-center">Sub Total</th>
							    </tr>
							  </thead>
							  <tbody class="travisTable">
	                                @foreach ($item as $item)
									    <tr>
									      <th scope="row">{{ $loop->iteration }}</th>
									      <td>{{$item->kode_produk}}</td>
									      <td>{{$item->nama_produk}}</td>
									      <td>{{$item->hargasatuan}}</td>
									      <td>{{$item->qty}}</td>
									      <td>{{$item->subtotal}}</td>
									    </tr>
								    @endforeach     
	                           </tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-lg-4">

					<div class="bayar mt-3">
						<ul class="list-unstyled">
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">Kode Struk</li>
									<li class="list-inline-item" style="float:right;">{{$orders->kode_struk}}</li>
								</ul>
							</li>
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">Tanggal</li>
									<li class="list-inline-item" style="float:right;">{{$orders->tanggal}}</li>
								</ul>
							</li>
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">Customer</li>
									<li class="list-inline-item" style="float:right;">{{$orders->nama_customer}}</li>
								</ul>
							</li>
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">No. Hp</li>
									<li class="list-inline-item" style="float:right;">{{$orders->no_handphone}}</li>
								</ul>
							</li>
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">Alamat</li>
									<li class="list-inline-item" style="float:right;">{{$orders->alamat}}</li>
								</ul>
							</li>
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">GrandTotal</li>
									<li class="list-inline-item" style="float:right;">Rp. {{$orders->grandtotal}}</li>
								</ul>
							</li>
							<li class="mt-3">
								<ul class="list-inline">
									<li class="list-inline-item">Payment</li>
									<li class="list-inline-item" style="float:right;">Rp. {{$orders->payment}}</li>
								</ul>
							</li>
							<li class="mt-3">
								<ul class="list-inline">
									<li class="list-inline-item">Balance</li>
									<li class="list-inline-item" style="float:right;">Rp. {{$orders->balance}}</li>
								</ul>
							</li>
						</ul>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection