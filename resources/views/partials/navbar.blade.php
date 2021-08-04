<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container">
	    <a class="navbar-brand" href="#">POINT OF SALE</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link {{($acktive === "Dasbor") ? 'active' : ''}}" href="{{url ('/')}}">Dashboard</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link {{($acktive === "Order") ? 'active' : ''}}" href="{{url ('/order')}}">Transaksi</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link {{($acktive === "Produk") ? 'active' : ''}}" href="{{url ('/produk')}}">Produk</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link {{($acktive === "Customer") ? 'active' : ''}}" href="{{url ('/customer')}}">Customer</a>
	        </li>
	      </ul>
	      
	    </div>
	  </div>
	</nav>