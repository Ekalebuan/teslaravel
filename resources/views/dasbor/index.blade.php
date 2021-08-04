@extends('layout.main')

@section('title', 'POS - Dashboard')

@section('isi')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			

			<div class="row">
				<div class="col-lg-8">
					<div class="form_add mt-3">
						
						<div class="row">
							<div class="col-md-1">
								<div class="mb-3">
								  <label for="no" class="form-label">No</label>
								  <input type="number" class="form-control form-control-sm" name="no" id="no" placeholder="" value="{{ old('no') }}" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
								  <label for="kode_produk" class="form-label">Kode Produk</label>
								  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kode_produk" id="kode_produk">
									  <option value="">Pilih Produk</option>
									  @foreach ($produk as $produk)
									  	<option value="{{$produk->kode_produk}}">{{$produk->kode_produk}}</option>
									  @endforeach
									</select>
								</div>
							</div>

							<div class="col-md-7">
								<div class="mb-3">
								  <label for="nama_produk" class="form-label">Nama Produk</label>
								  <input type="text" class="form-control form-control-sm" name="nama_produk" id="nama_produk" placeholder="" value="{{ old('nama_produk') }}" readonly>
								</div>
							</div>

							<div class="col-md-4">
								<div class="mb-3">
								  <label for="hargasatuan" class="form-label">Harga Satuan</label>
								  <input type="number" class="form-control form-control-sm" name="hargasatuan" id="hargasatuan" placeholder="" value="{{ old('hargasatuan') }}" readonly>
								</div>
							</div>

							<div class="col-md-4">
								<div class="mb-3">
								  <label for="qty" class="form-label">Quantity</label>
								  <input type="number" class="form-control form-control-sm" name="qty" id="qty" placeholder="" value="{{ old('qty') }}">
								</div>
							</div>

							<div class="col-md-4">
								<div class="mb-3">
								  <label for="subtotal" class="form-label">Sub Total</label>
								  <input type="number" class="form-control form-control-sm" name="subtotal" id="subtotal" placeholder="" value="{{ old('subtotal') }}" readonly>
								</div>
							</div>

							<div class="col-md-12">
								<div class="mb-3 mt-4">
								  <button id="tambahItem" class="btn btn-sm btn-primary">Tambah</button>
								  <button id="hapusItem" class="btn btn-sm btn-danger">Hapus</button>
								</div>
							</div>

						</div>
					</div>

					<div class="mt-3">
						<div class="table-responsive">
							<table class="table">
							  <thead class="thead-dark">
							    <tr>
							    	<th scope="col" class="text-center">No</th>
							      	<th scope="col" class="text-center">Kode</th>
							      	<th scope="col" class="text-center">Produk</th>
							      	<th scope="col" class="text-center">Harga</th>
							      	<th scope="col" class="text-center">Quantity</th>
							      	<th scope="col" class="text-center">Sub Total</th>
							    </tr>
							  </thead>
							  <tbody class="travisTable" id="showData">
	                                        
	                           </tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="strukdetail mt-3">
						<ul class="list-inline">
							{{-- <li class="list-inline-item">#<span id="kodestruk">{{$kode}}</span></li> --}}
							<li class="list-inline-item"><strong>Date </strong>: {{date('d-m-Y')}}</li>
							<li class="list-inline-item"><strong>Time </strong>: {{date('H:s:i')}}</li>
						</ul>
					</div>

					<div class="customers mt-3">
						<div class="mb-3">
							<label for="no_handphone" class="form-label">No Handphone</label>
						  	<input type="text" class="form-control form-control-sm" name="no_handphone" id="no_handphoneAdd" placeholder="" value="{{ old('no_handphone') }}">
						  	<div id="erorcust"><small class="text-danger">No handphone belum terdaftar</small></div>
						</div>

						<div class="mb-3">
						  	<label for="id_customer" class="form-label">IdCustomer</label>
						  	<input type="text" class="form-control form-control-sm" name="id_customer" id="id_customer" placeholder="" value="{{ old('id_customer') }}" readonly>
						</div>

						<div class="mb-3">
						  	<label for="nama_customer" class="form-label">Customer</label>
						  	<input type="text" class="form-control form-control-sm" name="nama_customer" id="nama_customer" placeholder="" value="{{ old('nama_customer') }}" readonly>
						</div>

						<div class="mb-3">
						  	<label for="alamat" class="form-label">Alamat</label>
						  	<input type="text" class="form-control form-control-sm" name="alamat" id="alamat" placeholder="" value="{{ old('alamat') }}" readonly>
						</div>
					</div>

					<div class="bayar mt-3">
						<ul class="list-unstyled">
							<li>
								<ul class="list-inline">
									<li class="list-inline-item">GrandTotal</li>
									<li class="list-inline-item" style="float:right;">Rp. <span id="grandTotal"></span></li>
								</ul>
							</li>
							<li class="mt-3">
								<ul class="list-inline">
									<li class="list-inline-item">Payment</li>
									<li class="list-inline-item" style="float:right;">
										<input type="number" class="form-control form-control-sm" name="payment" id="payment" placeholder="" value="{{ old('payment') }}" >
									</li>
								</ul>
							</li>
							<li class="mt-3">
								<ul class="list-inline">
									<li class="list-inline-item">Balance</li>
									<li class="list-inline-item" style="float:right;">Rp. <span id="balance"></span></li>
								</ul>
							</li>
						</ul>
					</div>

					<div class="mb-3 mt-4 btnsaveorder">
					  <button id="saveOrder" class="btn btn-sm btn-success">Simpan</button>
					  <button id="hapusItem" type="reset" class="btn btn-sm btn-secondary">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection