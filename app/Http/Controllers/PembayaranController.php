<?php

namespace App\Http\Controllers;
use App\Models\pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PembayaranController extends Controller
{
    //
    public function index(){
        $pembayarans=pembayaran::latest()->paginate(10);
        return view('pembayaran.index', compact('pembayarans'));
    }
    public function create()
 {
 return view('pembayaran.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'metodepembayaran'=>'required',
 'statuspembayaran'=>'required',
  ]);
  DB::table('pembayarans')->insert([
  'metodepembayaran'=>$request->metodepembayaran,
  'statuspembayaran'=>$request->statuspembayaran,

  ]);
  if(DB::table('pembayarans')){
    return redirect()->route('pembayaran.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('pembayaran.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(pembayaran $pembayaran)
{
return view('pembayaran.edit', compact('pembayaran'));
}
public function update(Request $request, pembayaran $pembayaran)
{
$this->validate($request, [
'metodepembayaran' => 'required',
'statuspembayaran' => 'required',

]);
//get data mapel by ID
$pembayaran=pembayaran::findOrFail($pembayaran->id);
$pembayaran->update([
'metodepembayaran'=>$request->metodepembayaran,
'statuspembayaran'=>$request->statuspembayaran,

]);
if($pembayaran){
//redirect dengan pesan sukses
return redirect()->route('pembayaran.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('pembayaran.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $pembayaran=pembayaran::findOrFail($id);

    $pembayaran->delete();

    if($pembayaran){
        //pesan sukses
        return redirect()->route('pembayaran.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('pembayaran.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
