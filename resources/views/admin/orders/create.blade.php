@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col mt-4">
      <h3>Menambahkan Alamat</h3>

      <br />
      @if(count($errors))
      <div class="form-group">
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
      <br />
    
      <form action="{{ route('admin.orders.store') }}" method="POST">
      @csrf
        <div class="form-group mb-3">
          <label>Alamat Pengiriman</label>
          <textarea name="shipping_address" class="form-control" rows="3" placeholder="Alamat Pengiriman"></textarea>
        </div>
        
        <div class="form-group mb-3">
          <label>Kode Pos</label>
          <input type="number" name="zip_code" class="form-control" placeholder="Kode Pos">
        </div>
        <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" name="" id="provinsi">
                            <option hidden>Pilih provinsi</option>
                            @foreach ($provinsi as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">kota</label>
                        <select class="form-control" name="kota" id="kota"></select>
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan"></select>
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan"></select>
                    </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
      </form>
    </div>
  </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
            $('#provinsi').on('change', function() {
               var provinsiID = $(this).val();
               if(provinsiID) {
                   $.ajax({
                       url: '/getKota/'+provinsiID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#kota').empty();
                            $('#kota').append('<option hidden>Pilih Kota</option>'); 
                            $.each(data, function(key, kota){
                                $('select[name="kota"]').append('<option value="'+ kota.id +'">' + kota.name+ '</option>');
                            });
                        }else{
                            $('#kota').empty();
                        }
                     }
                   });
               }else{
                    $('#kota').empty();
               }
            });

            $('#kota').on('change', function() {
               var kotaID = $(this).val();
               console.log(kotaID)
               if(kotaID) {
                   $.ajax({
                       url: '/getKecamatan/'+kotaID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $("#kecamatan").empty();
                            $('#kecamatan').append('<option hidden>Pilih Kecamatan</option>'); 
                            $.each(data, function(key, kecamatan){
                                $('select[name="kecamatan"]').append('<option value="'+ kecamatan.id +'">' + kecamatan.name+ '</option>');
                            });
                        }else{
                            $('#kecamatan').empty();
                        }
                     }
                   });
               }else{
                    $('#kecamatan').empty();
               }
            });
            
            $('#kecamatan').on('change', function() {
               var kecamatanID = $(this).val();
               console.log(kecamatanID)
               if(kecamatanID) {
                   $.ajax({
                       url: '/getKelurahan/'+kecamatanID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $("#kelurahan").empty();
                            $('#kelurahan').append('<option hidden>Pilih Kelurahan</option>');  
                            $.each(data, function(key, kelurahan){
                                $('select[name="kelurahan"]').append('<option value="'+ kelurahan.id +'">' + kelurahan.name+ '</option>');
                            });
                        }else{
                            $('#kelurahan').empty();
                        }
                     }
                   });
               }else{
                    $('#kelurahan').empty();
               }
            });
            });
    </script>
</div>
@endsection