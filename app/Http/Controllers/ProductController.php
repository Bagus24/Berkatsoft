<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::orderBy('nama', 'ASC')->simplePaginate(10);
        return view('product.index', compact('product'));
    }


    public function create()
    {
        return view('product.add');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:40'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required']
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Product::create([
            'nama' => $request['nama'],
            'harga' => $request['harga'],
            'deskripsi' => $request['deskripsi']
        ]);
        return redirect('product')->with('tambah', 'Data telah ditambah!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        Product::whereId($id)->update([
            'nama' => $request['nama'],
            'harga' => $request['harga'],
            'deskripsi' => $request['deskripsi']
        ]);
        return redirect('product')->with('sunting', 'Data telah diubah!');
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('product')->with('hapus', 'Data telah dihapus!');
    }

    public function cariData(Request $request)
    {
        $cari = $request['cari'];
        $product = Product::orderBy('nama', 'ASC')
            ->orwhere('nama', 'like', "%" . $cari . "%")
            ->orwhere('harga', 'like', "%" . $cari . "%")
            ->orwhere('deskripsi', 'like', "%" . $cari . "%")
            ->simplePaginate(10);
        return view('product.index', compact('product'));
    }
}
