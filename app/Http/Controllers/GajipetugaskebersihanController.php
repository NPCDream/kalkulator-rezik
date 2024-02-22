<?php

namespace App\Http\Controllers;
use App\Models\gajipetugaskebersihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GajipetugaskebersihanController extends Controller
{
    //
    public function index(){
        $gajipetugaskebersihans=gajipetugaskebersihan::latest()->paginate(10);
        return view('gajipetugaskebersihan.index', compact('gajipetugaskebersihans'));
    }
    public function create()
 {
 return view('gajipetugaskebersihan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namapetugaskebersihan'=>'required',
 'gaji'=>'required',
  ]);
  DB::table('gajipetugaskebersihans')->insert([
  'namapetugaskebersihan'=>$request->namapetugaskebersihan,
  'gaji'=>$request->gaji,

  ]);
  if(DB::table('gajipetugaskebersihans')){
    return redirect()->route('gajipetugaskebersihan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('gajipetugaskebersihan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(gajipetugaskebersihan $gajipetugaskebersihan)
{
return view('gajipetugaskebersihan.edit', compact('gajipetugaskebersihan'));
}
public function update(Request $request, gajipetugaskebersihan $gajipetugaskebersihan)
{
$this->validate($request, [
'namapetugaskebersihan' => 'required',
'gaji' => 'required',

]);
//get data mapel by ID
$gajipetugaskebersihan=gajipetugaskebersihan::findOrFail($gajipetugaskebersihan->id);
$gajipetugaskebersihan->update([
'namapetugaskebersihan'=>$request->namapetugaskebersihan,
'gaji'=>$request->gaji,

]);
if($gajipetugaskebersihan){
//redirect dengan pesan sukses
return redirect()->route('gajipetugaskebersihan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('gajipetugaskebersihan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $gajipetugaskebersihan=gajipetugaskebersihan::findOrFail($id);

    $gajipetugaskebersihan->delete();

    if($gajipetugaskebersihan){
        //pesan sukses
        return redirect()->route('gajipetugaskebersihan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('gajipetugaskebersihan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
