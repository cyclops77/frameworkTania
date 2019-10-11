@extends('master.index')

@section('content')

<br>
<br>
<br>
<form action="/input-stock" method="POST">
  {{csrf_field()}}
  
  <input type="hidden" name="idnya" value="{{$snack->id}}">
  <input type="hidden" name="harganya" value="{{$snack->harga}}" id="harga" onkeyup="hitung()">
  <input type="hidden" name="stoknya" value="{{$snack->stock}}" id="stock" onkeyup="hitung()">
  <h3>Item : {{$snack->nama_snack}}</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Jumlah Stock</label>
    <input type="number" class="form-control" placeholder="Jumlah Item" name="jumlah" id="jumlah" onkeyup="hitung()">
  </div>

  <!-- div class="form-group">
    <label for="exampleInputEmail1">Sisa Stok</label>
    <input type="number" class="form-control" name="sisa_stok" disabled id="sisa_stok" onkeyup="hitung()">
  </div> -->
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection

@section('script')

<!-- <script>
function hitung() {
  
  var x;
  var y;
  var total;
  var stok;
  var stokSaatIni;
    x = document.getElementById("harga").value ;
    y = document.getElementById("jumlah").value ;
    stok = document.getElementById("stock").value;
    // stockNow = x+y;
    stokSaatIni = stok+y;

    // document.getElementById("harga_total").value = total;
    document.getElementById("sisa_stok").value = stokSaatIni;
   
}
</script> -->


@endsection