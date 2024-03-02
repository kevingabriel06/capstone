@extends('layout.layout')

@section('content')

      <!-- division -->

      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
            </div>
            <form action="{{route('attendance.scan')}}" method="POST" class="form-horizontal" id='form'>
            @csrf
            <div class="col-md-6">
                <label>SCAN QR CODE</label>
                <input type="text" name="text" id="text" readonly="" placeholder="scan qr code" class="form-control">
            </div>
            </form>
        </div>
      </div>

      <script>
          let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
          Instascan.Camera.getCameras().then(function(cameras){
              if(cameras.length> 0){
                  scanner.start(cameras[0]);
              }else{
                  alert('No cameras found.');
              }
          }).catch(function(e){
              console.error(e);
            });

          scanner.addListener('scan', function(c){
              document.getElementById('text').value=c;
              document.getElementById('form').submit();
          });
      </script>

@endsection