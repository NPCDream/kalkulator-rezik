<?php

namespace App\Http\Controllers;
use App\Models\pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PembeliController extends Controller
{
    //
    public function index(){
        $pembelis=pembeli::latest()->paginate(10);
        return view('pembeli.index', compact('pembelis'));
    }
    public function create()
 {
 return view('pembeli.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namapembeli'=>'required',
 'alamat'=>'required',
 'no'=>'required',
  ]);
  DB::table('pembelis')->insert([
  'namapembeli'=>$request->namapembeli,
  'alamat'=>$request->alamat,
  'no'=>$request->no,
  ]);
  if(DB::table('pembelis')){
    return redirect()->route('pembeli.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('pembeli.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(pembeli $pembeli)
{
return view('pembeli.edit', compact('pembeli'));
}
public function update(Request $request, pembeli $pembeli)
{
$this->validate($request, [
'namapembeli' => 'required',
'alamat' => 'required',
'no' => 'required'
]);
//get data mapel by ID
$pembeli=pembeli::findOrFail($pembeli->id);
$pembeli->update([
'namapembeli'=>$request->namapembeli,
'alamat'=>$request->alamat,
'no'=>$request->no,
]);
if($pembeli){
//redirect dengan pesan sukses
return redirect()->route('pembeli.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('pembeli.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $pembeli=pembeli::findOrFail($id);

    $pembeli->delete();

    if($pembeli){
        //pesan sukses
        return redirect()->route('pembeli.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('pembeli.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
