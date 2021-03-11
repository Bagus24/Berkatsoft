@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Produk</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama produk.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ old('nama') }}" autocomplete="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Produk (Rp.)</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan harga produk.." type="number" class="form-control @error('harga') is-invalid @enderror" required name="harga" value="{{ old('harga') }}" autocomplete="harga">
                    @error('harga')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Produk</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required></textarea>
                </div>
            </div>
            

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection