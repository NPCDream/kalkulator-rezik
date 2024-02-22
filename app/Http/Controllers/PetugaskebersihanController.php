<?php

namespace App\Http\Controllers;
use App\Models\petugaskebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PetugaskebersihanController extends Controller
{
    //
    public function index(){
        $petugaskebersihans=petugaskebersihan::latest()->paginate(10);
        return view('petugaskebersihan.index', compact('petugaskebersihans'));
    }
    public function create()
 {
 return view('petugaskebersihan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namapetugaskebersihan'=>'required',
 'alamat'=>'required',
 'no'=>'required',
  ]);
  DB::table('petugaskebersihans')->insert([
  'namapetugaskebersihan'=>$request->namapetugaskebersihan,
  'alamat'=>$request->alamat,
  'no'=>$request->no,
  ]);
  if(DB::table('petugaskebersihans')){
    return redirect()->route('petugaskebersihan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('petugaskebersihan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(petugaskebersihan $petugaskebersihan)
{
return view('petugaskebersihan.edit', compact('petugaskebersihan'));
}
public function update(Request $request, petugaskebersihan $petugaskebersihan)
{
$this->validate($request, [
'namapetugaskebersihan' => 'required',
'alamat' => 'required',
'no' => 'required'
]);
//get data mapel by ID
$petugaskebersihan=petugaskebersihan::findOrFail($petugaskebersihan->id);
$petugaskebersihan->update([
'namapetugaskebersihan'=>$request->namapetugaskebersihan,
'alamat'=>$request->alamat,
'no'=>$request->no,
]);
if($petugaskebersihan){
//redirect dengan pesan sukses
return redirect()->route('petugaskebersihan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('petugaskebersihan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $petugaskebersihan=petugaskebersihan::findOrFail($id);

    $petugaskebersihan->delete();

    if($petugaskebersihan){
        //pesan sukses
        return redirect()->route('petugaskebersihan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('petugaskebersihan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
