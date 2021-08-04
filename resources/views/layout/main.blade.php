<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>@yield('title')</title>
  </head>
  <body>
    @include('partials.navbar')

	@yield('isi')

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script type="text/javascript">
   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        $("#kode_produk").change(function(){ 
            if ($("#kode_produk").val() == '') {
                $('[id="nama_produk"]').val('');
                $('[id="hargasatuan"]').val('');
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{('/requestProduk') }}",
                    data: {kode_produk : $("#kode_produk").val()},
                    dataType: "json",
                    beforeSend: function(e) {
                        if(e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response){
                         $.each(response,function(){
                            $('[id="nama_produk"]').val(response.item.nama_produk);
                            $('[id="hargasatuan"]').val(response.item.harga);
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) { 
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
                    }
                });
            }
            
        });
        $("#erorcust").hide();
        $(document).on('blur', '#no_handphoneAdd', function(e){

            $.ajax({
                type: "GET",
                url: "{{'/getCustomer'}}",
                data: {no_handphone : $("#no_handphoneAdd").val()},
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    
                    $.each(response,function(){
                        if (response.item == null) {
                            $("#erorcust").show();
                            $("#id_customer").val('');
                            $("#nama_customer").val('');
                            $("#alamat").val('');
                        } else {
                          $("#erorcust").hide();
                          $("#id_customer").val(response.item.id_customer);
                          $("#nama_customer").val(response.item.nama_customer);
                          $("#alamat").val(response.item.alamat);
                        }
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) { 
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
                }
            });

        });


        $("#qty").on('input',function(){
            if ($("#hargasatuan").val()=='') {
                alert("Pilih produk dulu !")
                $("#qty").val('');
                return;
            } 

            if ($("#qty").val() != '') {
                var harga = $("#hargasatuan").val();
                var qty = $("#qty").val();
                var subTotal =parseFloat(harga)*parseFloat(qty);
            } else {
                var subTotal = 0;
            }

            $('#subtotal').val(subTotal);
        });

        var data2 = [];

        $('#tambahItem').on('click',function(){

            if ($('#kode_produk').val() == '') {
                alert("Pilih produk dulu !")
                return;
            }


            if ($('#qty').val() == '') {
                alert("Quantity harus diisi !")
                return;
            }

            if ($('#qty').val() == 0) {
                alert("Quantity tidak boleh nol !")
                return;
            }


            var data = {};

            var nomor =0
            if (data2.length == 0) {
                nomor = 1
            }else{
                nomor = data2.length+1
            }

            if ($('#no').val() != "" ){
                for (var i = data2.length - 1; i >= 0; i--) {
                    if (data2[i].no ==  $('#no').val()){
                        data.no = $('#no').val();

                        data.kode_produk    = $('#kode_produk').val();
                        data.nama_produk    = $('#nama_produk').val();
                        data.hargasatuan    = $('#hargasatuan').val();
                        data.qty            = $('#qty').val();
                        data.subtotal       = $('#subtotal').val();

                        data2[i] = data;

                        var grandTotal = 0 ;
                        for (var i = data2.length - 1; i >= 0; i--) {
                            grandTotal =grandTotal+ parseFloat(data2[i].subtotal)
                        }
                        $('[id="grandTotal"]').html(grandTotal);
                        
                    }
                }

            }else{
                data={
                        no : nomor,
                        kode_produk     : $('#kode_produk').val(),
                        nama_produk     : $('#nama_produk').val(),
                        hargasatuan     : $('#hargasatuan').val(),
                        qty             : $('#qty').val(),
                        subtotal        : $('#subtotal').val()
                    }
                data2.push(data);
                
                var grandTotal = 0 ;
                for (var i = data2.length - 1; i >= 0; i--) {
                    grandTotal =grandTotal+ parseFloat(data2[i].subtotal)
                }
                $('[id="grandTotal"]').html(grandTotal);
            }
            tampil_data();
            kosongkan();
           
            return false;
        });

        function tampil_data(){
          var html = '';
          var i;
          for(i=0; i<data2.length; i++){
              html += '<tr id="klcik">'+
                      '<td class="text-center">'+data2[i].no+'</td>'+
                      '<td>'+data2[i].kode_produk+'</td>'+
                      '<td>'+data2[i].nama_produk+'</td>'+
                      '<td>'+data2[i].hargasatuan+'</td>'+
                      '<td class="text-right">'+data2[i].qty+'</td>'+
                      '<td class="text-right">'+data2[i].subtotal+'</td>'+
                      '</tr>';
          }
          $('#showData').html(html);
        }

        function kosongkan(){
          $('#kode_produk').val('');
          $('#nama_produk').val('');
          $('#hargasatuan').val("");
          $('#qty').val('');
          $('#subtotal').val('');
          $('#no').val('');
        }

        $(document).on('click', '#klcik', function(e){
          e.preventDefault();
          var grid = this;
          var no            = e.currentTarget.cells[0].innerHTML;
          var kode_produk   = e.currentTarget.cells[1].innerHTML;
          var nama_produk   = e.currentTarget.cells[2].innerHTML;
          var hargasatuan   = e.currentTarget.cells[3].innerHTML;
          var qty           = e.currentTarget.cells[4].innerHTML;
          var subtotal      = e.currentTarget.cells[5].innerHTML;

          $('#no').val(no);
          $('#kode_produk').val(kode_produk);
          $('#nama_produk').val(nama_produk);
          $('#hargasatuan').val(hargasatuan);
          $('#qty').val(qty);
          $('#subtotal').val(subtotal);
        });

        $('#hapusItem').on('click',function(){

            if ($('#no').val() == '') {
                alert("Pilih item yang akan dihapus dulu!")
                return;
            }
            if ($('#kode_produk').val() == '') {
                alert("Pilih item akan dihapus dulu!")
                return;
            }

            if ($('#no').val() !=""){
                for (var i = data2.length - 1; i >= 0; i--) {
                    if (data2[i].no ==  $('#no').val()){                            
                        data2.splice(i, 1);

                        var grandTotal = 0 ;
                        for (var i = data2.length - 1; i >= 0; i--) {
                            grandTotal =grandTotal+ parseFloat(data2[i].subtotal)
                        }
                        $('[id="grandTotal"]').html(grandTotal);
                      }
                    }
                tampil_data();
                kosongkan();
            }
        });

        $("#payment").on('input',function(){
            if ($("#grandTotal").html()=='') {
                alert("GrandTotal belum ada !")
                $("#payment").val('');
                return;
            }


            if ($("#payment").val() != '') {
                var grand   = $("#grandTotal").html();
                var payment = $("#payment").val();
                var balance =parseFloat(payment)-parseFloat(grand);
            } else {
                var balance = 0;
            }

            $('#balance').html(balance);
        });

        $('#saveOrder').on('click',function(){
            debugger;
            if ($('#id_customer').val() == '') {
                alert("Id Customer harus diisi !")
                return;
            }

            if ($('#kodestruk').html() == '') {
                alert("Kode struk tidak tercetak otomatis !")
                return;
            }

            if ($('#grandTotal').html() == '') {
                alert("granTotal tidak boleh kosong !")
                return;
            }

            if ($('#payment').val() == '') {
                alert("payment belum diinput !")
                return;
            }

            if ($('#balance').html() == '') {
                alert("balance tidak boleh kosong !")
                return;
            }


            if (data2.length==0) {
                alert("Input item order !")
                return;
            }
            debugger;
            var order = {
                id_customer: $('#id_customer').val(),
                tanggal: '{{date('Y-m-d H:i:s')}}',
                grandtotal: $('#grandTotal').html(),
                payment: $('#payment').val(),
                balance: $('#balance').html()
            }
            debugger;
            $("#btnsaveorder").hide();
            debugger;
            $.ajax({
                method:"POST",
                url: "{{'/simpanOrder'}}", 
                data: {order : order, detail:data2}, 
                dataType: "json",
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response){
                    
                     $.each(response,function(){
                       
                        var datass=response.result;
                        location.href='{{'/order'}}';

                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

    </script>
  </body>
</html>