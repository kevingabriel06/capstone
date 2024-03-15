@extends('layout.layout')

@section('content')

      <!-- division -->

      <div class="container">
        <div class="row">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>
            </div>
            <form action="{{ route('attendance.scan', ['activity_id' => $activity_id]) }}" method="POST" class="form-horizontal" id="form">
                @csrf
                <div class="col-md-6">
                    <label>SCAN QR CODE</label>
                    <input type="text" name="student_id" id="text" readonly="" placeholder="scan qr code" class="form-control">
                </div>
            </form>
        </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });

        function extractIntegers(text) {
            // Regular expression to match integers including hyphens
            const regex = /[\d-]+/g;
            const integersArray = text.match(regex);
            if (integersArray && integersArray.length > 0) {
                // Join integers with space
                return integersArray.join(' ');
            } else {
                return null; // No integers found
            }
        }

        scanner.addListener('scan', function(content) {
            let text = extractIntegers(content);
            if (text) {
                document.getElementById('text').value = text;
                document.getElementById('form').submit();
            } else {
                console.log('No QR code detected or no integers extracted.');
            }
        });
    </script>


@endsection