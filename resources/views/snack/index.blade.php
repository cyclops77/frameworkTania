@extends('master.index')

@section('script')
<script type="text/javascript">
   function closeFunction(){
      document.getElementById("popup").style.display = "none";
   }
</script>
@endsection

<div class="itemnya" onclick="closeFunction()" id="popup" style="display: {{!empty($snackSorts) ? "block" : "none"}};">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notifikasi Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda memiliki stock yang berada di bawah <strong>25</strong>, silahkan isi stock anda melalui fitur <strong>ISI STOCK</strong> dengan <strong>kolom berlabel warna merah</strong></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>




<style>
  .itemnya{
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
  }.putihnya{
    width: 50%;
    height: 450px;
    margin-left: 25%;
    margin-top: 5%;
    margin-right: 25%;
    background-color: white;
  }.x{
    text-align: right;
    margin: 25px 5px 0px 0px;
    cursor: pointer;
  }
</style>
@section('content')


<br>
<br>
<br>
<br>
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  Tambah Snack
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Snack</th>
      <th scope="col">Varian</th>
      <th scope="col">Stock</th>
      <th scope="col">Harga</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
   @foreach($snack as $s)
    <tr class="{{$s->stock <= 25 ? "table-danger" : ""}}">
      <td>{{$s->id}}</td>
      <td>{{$s->nama_snack}}</td>
      <td>{{$s->varian_snack}}</td>
      <td>{{$s->stock}}</td>
      <td>{{$s->harga}}</td>
      <td>
        <a href="/beli/{{$s->id}}" class="btn btn-primary btn-sm">Beli</a>
        <a href="/isi-stock/{{$s->id}}" class="btn btn-primary btn-sm">Isi Stock</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tambah-snack" method="POST">
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Snack</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Nama Snack" name="nama_snack">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Varian Snack</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Varian Snack" name="varian_snack">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Jumlah Stock</label>
    <input type="number" class="form-control" id="exampleInputEmail1"  placeholder="Jumlah Stock" name="stock">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Harga</label>
    <input type="harga" class="form-control" id="exampleInputEmail1"  placeholder="Harga Snack" name="harga">
  </div>
 
  <button type="submit" class="btn btn-primary float-right">Buat</button>
</form>
      </div>
      
    </div>
  </div>
</div>












@endsection

