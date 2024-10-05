@extends('layouts.app')

@section('title', 'Cek Status Aduan - SurabayaTanggap')

@section('content')
    <h1>Cek Status Aduan</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nomor_aduan" class="form-label">Nomor Aduan</label>
                    <input type="text" class="form-control" id="nomor_aduan" name="nomor_aduan" required>
                </div>
                <div class="mb-3">
                    <label for="pin" class="form-label">PIN</label>
                    <input type="password" class="form-control" id="pin" name="pin" required>
                </div