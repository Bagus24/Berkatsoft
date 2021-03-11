@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Sales Order</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('salesorder.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daftar Customer</label>
                <div class="col-sm-12 col-md-7">
                    <select name="id_customer" class="form-control select2" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($customer as $c)
                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daftar Product</label>
                <div class="col-sm-12 col-md-7">
                    <select name="id_product[]" class="form-control" multiple="" data-height="100%">
                        @foreach ($product as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
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