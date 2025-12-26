@extends('layouts.app') 
{{-- Assuming layouts.app is not usable because of the error, let's make it standalone or simple --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Terjadi Kesalahan - SMA Masehi Kudus</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">500</h1>
                    <h1 class="mb-4">Terjadi Kesalahan Sistem</h1>
                    <p class="mb-4">Maaf, ada kendala teknis di sisi server kami. Silakan coba lagi beberapa saat lagi atau hubungi admin.</p>
                    <a class="btn btn-primary py-3 px-5" href="{{ url('/') }}">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
