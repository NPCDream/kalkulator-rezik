<?php

namespace App\Http\Controllers;
use App\Models\gajikariawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class GajikariawanController extends Controller
{
    //
    public function index(){
        $gajikariawans=gajikariawan::latest()->paginate(10);
        return view('gajikariawan.index', compact('gajikariawans'));
    }
    public function create()
 {
 return view('gajikariawan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namakariawan'=>'required',
 'gaji'=>'required',
  ]);
  DB::table('gajikariawans')->insert([
  'namakariawan'=>$request->namakariawan,
  'gaji'=>$request->gaji,

  ]);
  if(DB::table('gajikariawans')){
    return redirect()->route('gajikariawan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('gajikariawan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(gajikariawan $gajikariawan)
{
return view('gajikariawan.edit', compact('gajikariawan'));
}
public function update(Request $request, gajikariawan $gajikariawan)
{
$this->validate($request, [
'namakariawan' => 'required',
'gaji' => 'required',

]);
//get data mapel by ID
$gajikariawan=gajikariawan::findOrFail($gajikariawan->id);
$gajikariawan->update([
'namakariawan'=>$request->namakariawan,
'gaji'=>$request->gaji,

]);
if($gajikariawan){
//redirect dengan pesan sukses
return redirect()->route('gajikariawan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('gajikariawan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $gajikariawan=gajikariawan::findOrFail($id);

    $gajikariawan->delete();

    if($gajikariawan){
        //pesan sukses
        return redirect()->route('gajikariawan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('gajikariawan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
