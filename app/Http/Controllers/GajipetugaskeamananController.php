<?php

namespace App\Http\Controllers;
use App\Models\gajipetugaskeamanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GajipetugaskeamananController extends Controller
{
    //
    public function index(){
        $gajipetugaskeamanans=gajipetugaskeamanan::latest()->paginate(10);
        return view('gajipetugaskeamanan.index', compact('gajipetugaskeamanans'));
    }
    public function create()
 {
 return view('gajipetugaskeamanan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namapetugaskeamanan'=>'required',
 'gaji'=>'required',
  ]);
  DB::table('gajipetugaskeamanans')->insert([
  'namapetugaskeamanan'=>$request->namapetugaskeamanan,
  'gaji'=>$request->gaji,

  ]);
  if(DB::table('gajipetugaskeamanans')){
    return redirect()->route('gajipetugaskeamanan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('gajipetugaskeamanan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(gajipetugaskeamanan $gajipetugaskeamanan)
{
return view('gajipetugaskeamanan.edit', compact('gajipetugaskeamanan'));
}
public function update(Request $request, gajipetugaskeamanan $gajipetugaskeamanan)
{
$this->validate($request, [
'namapetugaskeamanan' => 'required',
'gaji' => 'required',

]);
//get data mapel by ID
$gajipetugaskeamanan=gajipetugaskeamanan::findOrFail($gajipetugaskeamanan->id);
$gajipetugaskeamanan->update([
'namapetugaskeamanan'=>$request->namapetugaskeamanan,
'gaji'=>$request->gaji,

]);
if($gajipetugaskeamanan){
//redirect dengan pesan sukses
return redirect()->route('gajipetugaskeamanan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('gajipetugaskeamanan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $gajipetugaskeamanan=gajipetugaskeamanan::findOrFail($id);

    $gajipetugaskeamanan->delete();

    if($gajipetugaskeamanan){
        //pesan sukses
        return redirect()->route('gajipetugaskeamanan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('gajipetugaskeamanan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
