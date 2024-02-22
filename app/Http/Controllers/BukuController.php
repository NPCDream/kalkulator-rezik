<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    //
    public function index(){
        $bukus=buku::latest()->paginate(10);
        return view('buku.index', compact('bukus'));
    }
    public function create()
 {
 return view('buku.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'judul'=>'required',
 'penerbit'=>'required',
 'jumlah'=>'required',
  ]);
  DB::table('bukus')->insert([
  'judul'=>$request->judul,
  'penerbit'=>$request->penerbit,
  'jumlah'=>$request->jumlah,
  ]);
  if(DB::table('bukus')){
    return redirect()->route('buku.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(buku $buku)
{
return view('buku.edit', compact('buku'));
}
public function update(Request $request, buku $buku)
{
$this->validate($request, [
'judul' => 'required',
'penerbit' => 'required',
'jumlah' => 'required'
]);
//get data mapel by ID
$buku=buku::findOrFail($buku->id);
$buku->update([
'judul'=>$request->judul,
'penerbit'=>$request->penerbit,
'jumlah'=>$request->jumlah
]);
if($buku){
//redirect dengan pesan sukses
return redirect()->route('buku.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('buku.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $buku=buku::findOrFail($id);

    $buku->delete();

    if($buku){
        //pesan sukses
        return redirect()->route('buku.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('buku.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
