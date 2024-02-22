<?php

namespace App\Http\Controllers;
use App\Models\petugaskeamanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PetugaskeamananController extends Controller
{
    //
    public function index(){
        $petugaskeamanans=petugaskeamanan::latest()->paginate(10);
        return view('petugaskeamanan.index', compact('petugaskeamanans'));
    }
    public function create()
 {
 return view('petugaskeamanan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namapetugaskeamanan'=>'required',
 'alamat'=>'required',
 'no'=>'required',
  ]);
  DB::table('petugaskeamanans')->insert([
  'namapetugaskeamanan'=>$request->namapetugaskeamanan,
  'alamat'=>$request->alamat,
  'no'=>$request->no,
  ]);
  if(DB::table('petugaskeamanans')){
    return redirect()->route('petugaskeamanan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('petugaskeamanan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(petugaskeamanan $petugaskeamanan)
{
return view('petugaskeamanan.edit', compact('petugaskeamanan'));
}
public function update(Request $request, petugaskeamanan $petugaskeamanan)
{
$this->validate($request, [
'namapetugaskeamanan' => 'required',
'alamat' => 'required',
'no' => 'required'
]);
//get data mapel by ID
$petugaskeamanan=petugaskeamanan::findOrFail($petugaskeamanan->id);
$petugaskeamanan->update([
'namapetugaskeamanan'=>$request->namapetugaskeamanan,
'alamat'=>$request->alamat,
'no'=>$request->no,
]);
if($petugaskeamanan){
//redirect dengan pesan sukses
return redirect()->route('petugaskeamanan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('petugaskeamanan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $petugaskeamanan=petugaskeamanan::findOrFail($id);

    $petugaskeamanan->delete();

    if($petugaskeamanan){
        //pesan sukses
        return redirect()->route('petugaskeamanan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('petugaskeamanan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
