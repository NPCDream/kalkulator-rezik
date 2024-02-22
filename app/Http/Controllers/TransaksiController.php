<?php

namespace App\Http\Controllers;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class TransaksiController extends Controller
{
    //
    public function index(){
        $transaksis=transaksi::latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }
    public function create()
 {
 return view('transaksi.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'idtransaksi'=>'required',
 'namapembeli'=>'required',
 'tanggal'=>'required',
 'pembayaran'=>'required',
  ]);
  DB::table('transaksis')->insert([
  'idtransaksi'=>$request->idtransaksi,
  'namapembeli'=>$request->namapembeli,
  'tanggal'=>$request->tanggal,
  'pembayaran'=>$request->pembayaran,
  ]);
  if(DB::table('transaksis')){
    return redirect()->route('transaksi.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('transaksi.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(transaksi $transaksi)
{
return view('transaksi.edit', compact('transaksi'));
}
public function update(Request $request, transaksi $transaksi)
{
$this->validate($request, [
'idtransaksi' => 'required',
'namapembeli' => 'required',
'tanggal' => 'required',
'pembayaran'=>'required',
]);
//get data mapel by ID
$transaksi=transaksi::findOrFail($transaksi->id);
$transaksi->update([
'idtransaksi'=>$request->idtransaksi,
'namapembeli'=>$request->namapembeli,
'tanggal'=>$request->tanggal,
'pembayaran'=>$request->pembayaran,
]);
if($transaksi){
//redirect dengan pesan sukses
return redirect()->route('transaksi.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('transaksi.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $transaksi=transaksi::findOrFail($id);

    $transaksi->delete();

    if($transaksi){
        //pesan sukses
        return redirect()->route('transaksi.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('transaksi.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
