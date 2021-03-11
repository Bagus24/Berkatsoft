<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
   
    public function index()
    {
        $customer = Customer::orderBy('nama', 'ASC')->simplePaginate(10);
        return view('customer.index', compact('customer'));
    }

    
    public function create()
    {
        return view('customer.add');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:40'],
            'no_hp' => ['required', 'numeric'],
            'alamat' => ['required']
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $no_hp = $request['no_hp'];
        $hitung_no_hp = strlen($no_hp);
        if ($hitung_no_hp >= 14) {
            return back()->with('error_length_no_hp', 'Nomor HP terlalu panjang');
        }
        $val_no_hp = substr($no_hp, 0, 3);
        if ($val_no_hp != 628) {
            return back()->with('errorno_hp', 'Format No Hp salah!');
        }
        Customer::create([
            'nama' => $request['nama'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['alamat']
        ]);
        return redirect('customer')->with('tambah', 'Data telah ditambah!');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $no_hp = $request['no_hp'];
        $hitung_no_hp = strlen($no_hp);
        if ($hitung_no_hp >= 14) {
            return back()->with('error_length_no_hp', 'Nomor HP terlalu panjang');
        }
        $val_no_hp = substr($no_hp, 0, 3);
        if ($val_no_hp != 628) {
            return back()->with('errorno_hp', 'Format No Hp salah!');
        }
        Customer::whereId($id)->update([
            'nama' => $request['nama'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['alamat']
        ]);
        return redirect('customer')->with('sunting', 'Data telah diubah!');
    }

   
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return redirect('customer')->with('hapus', 'Data telah dihapus!');
    }

    public function cariData(Request $request)
    {
        $cari = $request['cari'];
        $customer = Customer::orderBy('nama', 'ASC')
            ->orwhere('nama', 'like', "%" . $cari . "%")
            ->orwhere('no_hp', 'like', "%" . $cari . "%")
            ->orwhere('alamat', 'like', "%" . $cari . "%")
            ->simplePaginate(10);
        return view('customer.index', compact('customer'));
    }
}
