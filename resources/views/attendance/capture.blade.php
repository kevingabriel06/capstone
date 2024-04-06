@extends('layout.layout')

@section('content')

<div class="container">
        

    <div class="container">
    <div id="my_camera"></div>
    <div id="results" style="visibility: hidden; position:absolute;"></div>
    <form action="{{ route('attendance.capture') }}" method="POST" enctype="multipart/form-data" id="imageForm">
        @csrf
        <input type="text" name="image" id="webcamID"> <!-- Hidden input field to hold the base64 image -->
        <button type="button" onclick="saveSnap();" class="btn btn-primary">Save</button>
    </form>
</div>

<!-- Include the Laravel CSRF token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Include the JavaScript libraries -->
<script src="{{ asset('assets/js/webcam.min.js') }}"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        configure();
    });

    function configure() {
        Webcam.set({
            width: 480,
            height: 360,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach('#my_camera');
    }

    function saveSnap() {
        Webcam.snap(function(data_uri) {
            document.getElementById('results').innerHTML = '<img id="webcam" src="' + data_uri + '"> ';
            
            // Extract base64 image data from data URI
            var base64image = data_uri.split(',')[1];
            document.getElementById('webcamID').value = base64image;

            // Submit the form
            document.getElementById('imageForm').submit();
            document.getElementById('form').submit();
        });

        Webcam.reset();
    }
    
    </script>

    
@endsection