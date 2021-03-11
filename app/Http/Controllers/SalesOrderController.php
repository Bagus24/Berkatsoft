<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    
    public function index()
    {
        $salesorder = SalesOrder::orderBy('updated_at', 'DESC')->simplePaginate(10);
        return view('salesorder.index', compact('salesorder'));
    }

   
    public function create()
    {
        $product = Product::orderBy('nama', 'ASC')->get();
        $customer = Customer::orderBY('nama', 'ASC')->get();
        return view('salesorder.add', compact('product', 'customer'));
    }

    
    public function store(Request $request)
    {
        $id_product = $request['id_product'];
        $id_customer = $request['id_customer'];
        $customer = Customer::where('id', $id_customer)->first();
        $nama_customer = $customer['nama'];
        $no_hp_customer = $customer['no_hp'];
        $alamat_customer = $customer['alamat'];
        foreach ($id_product as $ip) {
            $product = Product::where('id', $ip)->first();
            $nama_product = $product['nama'];
            $harga_product = $product['harga'];
            $deskripsi_product = $product['deskripsi'];

            SalesOrder::create([
                'id_product' => $ip,
                'id_customer' => $id_customer,
                'nama_product' => $nama_product,
                'harga' => $harga_product,
                'deskripsi' => $deskripsi_product,
                'nama_customer' => $nama_customer,
                'no_hp' => $no_hp_customer,
                'alamat' => $alamat_customer
            ]);
        }

        return redirect('salesorder')->with('tambah', 'Data telah ditambah!');
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function cariData(Request $request)
    {
        $cari = $request['cari'];
        $salesorder = SalesOrder::orderBy('updated_at', 'DESC')
            ->orwhere('nama_product', 'like', "%" . $cari . "%")
            ->orwhere('harga', 'like', "%" . $cari . "%")
            ->orwhere('deskripsi', 'like', "%" . $cari . "%")
            ->orwhere('nama_customer', 'like', "%" . $cari . "%")
            ->orwhere('no_hp', 'like', "%" . $cari . "%")
            ->orwhere('alamat', 'like', "%" . $cari . "%")
            ->simplePaginate(10);
        return view('salesorder.index', compact('salesorder'));
    }
}
