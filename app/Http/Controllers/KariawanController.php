<?php

namespace App\Http\Controllers;
use App\Models\kariawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class KariawanController extends Controller
{
    //
    public function index(){
        $kariawans=kariawan::latest()->paginate(10);
        return view('kariawan.index', compact('kariawans'));
    }
    public function create()
 {
 return view('kariawan.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'namakariawan'=>'required',
 'alamat'=>'required',
 'no'=>'required',
  ]);
  DB::table('kariawans')->insert([
  'namakariawan'=>$request->namakariawan,
  'alamat'=>$request->alamat,
  'no'=>$request->no,
  ]);
  if(DB::table('kariawans')){
    return redirect()->route('kariawan.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('kariawan.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(kariawan $kariawan)
{
return view('kariawan.edit', compact('kariawan'));
}
public function update(Request $request, kariawan $kariawan)
{
$this->validate($request, [
'namakariawan' => 'required',
'alamat' => 'required',
'no' => 'required'
]);
//get data mapel by ID
$kariawan=kariawan::findOrFail($kariawan->id);
$kariawan->update([
'namakariawan'=>$request->namakariawan,
'alamat'=>$request->alamat,
'no'=>$request->no,
]);
if($kariawan){
//redirect dengan pesan sukses
return redirect()->route('kariawan.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('kariawan.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $kariawan=kariawan::findOrFail($id);

    $kariawan->delete();

    if($kariawan){
        //pesan sukses
        return redirect()->route('kariawan.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('kariawan.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
