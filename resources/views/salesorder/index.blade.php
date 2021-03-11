@extends('layouts.app')
@section('content')

@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah ditambah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tabel Data Sales Order</h4>
    </div>


    <div class="card-body">
        <div class="float-left">
            <a href="{{ route('salesorder.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="float-right">
            <form action="{{ url('salesorder/cari') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="cari..">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix mb-3"></div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Nama Pemesan</th>
                    <th>No Hp Pemesan</th>
                    <th>Alamat Pemesan</th>
                </thead>

                @if ($salesorder->count() > 0)
                <?php $no = 0; ?>
                @foreach($salesorder as $s)
                <?php $no++; ?>
                <tr>
                    <td>
                        {{ $no }}
                    </td>
                    <td>
                        {{ $s->nama_product }}
                    </td>
                    <td>
                        {{ $s->harga }}
                    </td>
                    <td>
                        {{ $s->deskripsi }}
                    </td>
                    <td>
                        {{ $s->nama_customer}}
                    </td>
                    <td>
                        +{{ $s->no_hp }}
                    </td>
                    <td>
                        {{ $s->alamat }}
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
              
                </tr>
                @endif
            </table>

        </div>

    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                {{ $salesorder->links() }}
            </ul>
        </nav>
    </div>
</div>


@endsection