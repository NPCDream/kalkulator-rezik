<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    // Halaman utama
public function index()
    {
        $mapels=Mapel::latest()->paginate(10);
        return view('mapel.index', compact('mapels'));
    }
//Fungsi Menyimpan/Save
public function create()
 {
 return view('mapel.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'nama_mapel'=>'required',
 'namaguru'=>'required',
  ]);
  DB::table('mapels')->insert([
  'nama_mapel'=>$request->nama_mapel,
  'namaguru'=>$request->namaguru,
  ]);
  if(DB::table('mapels')){
    return redirect()->route('mapel.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('mapel.index')->with(['error'=>'Data gagal disimpan']);
 }
}
//  FUNGSI EDIT
public function edit(Mapel $mapel)
{
return view('mapel.edit', compact('mapel'));
}
public function update(Request $request, Mapel $mapel)
{
$this->validate($request, [
'nama_mapel' => 'required',
'namaguru' => 'required'
]);
//get data mapel by ID
$mapel=Mapel::findOrFail($mapel->id);
$mapel->update([
'nama_mapel'=>$request->nama_mapel,
'namaguru'=>$request->namaguru
]);
if($mapel){
//redirect dengan pesan sukses
return redirect()->route('mapel.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('mapel.index')->with(['error'=>'Data gagal disimpan']);
}
}
//FUNGSI HAPUS
public function destroy($id)
{
    $mapels=Mapel::findOrFail($id);

    $mapels->delete();

    if($mapels){
        //pesan sukses
        return redirect()->route('mapel.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
