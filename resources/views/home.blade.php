@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Halaman Utama</h4>
    </div>
    <div class="card-body">
        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Aplikasi Berkatsoft</p>
    </div>
</div>
@endsection