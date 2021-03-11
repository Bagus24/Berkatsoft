@extends('layouts.app')

@section('content')

@if (Session::has('errorno_hp'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Format No HP salah!'
    })
</script>
@endif
@if (Session::has('error_length_no_hp'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Nomor HP terlalu panjang!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Sunting Data Customer</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('customer.update', $customer->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama pelanggan.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ $customer->nama }}" autocomplete="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Hp</label>
                <div class="col-sm-12 col-md-7">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+</div>
                        </div>
                        <input id="inlineFormInputGroup" placeholder="masukan nomor hp dengan format 6281234xxxx.." type="number" class="form-control @error('no_hp') is-invalid @enderror" required name="no_hp" value="{{ $customer->no_hp }}" autocomplete="no_hp">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" required>{{ $customer->alamat }}</textarea>
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