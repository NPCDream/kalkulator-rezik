<?php

namespace App\Http\Controllers;
use App\Models\laundrie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class LaundryController extends Controller
{
    //
    public function index(){
        $laundries=laundrie::latest()->paginate(10);
        return view('laundrie.index', compact('laundries'));
    }
    public function create()
 {
 return view('laundrie.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
 'beratpakaian'=>'required',
 'hargaperkilo'=>'required',
 'alamat'=>'required',
  ]);
  DB::table('laundries')->insert([
  'beratpakaian'=>$request->beratpakaian,
  'hargaperkilo'=>$request->hargaperkilo,
  'alamat'=>$request->alamat,
  ]);
  if(DB::table('laundries')){
    return redirect()->route('laundrie.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('laundrie.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(laundrie $laundrie)
{
return view('laundrie.edit', compact('laundrie'));
}
public function update(Request $request, laundrie $laundrie)
{
$this->validate($request, [
'beratpakaian' => 'required',
'hargaperkilo' => 'required',
'alamat' => 'required'
]);
//get data mapel by ID
$laundrie=laundrie::findOrFail($laundrie->id);
$laundrie->update([
'beratpakaian'=>$request->beratpakaian,
'hargaperkilo'=>$request->hargaperkilo,
'alamat'=>$request->alamat,
]);
if($laundrie){
//redirect dengan pesan sukses
return redirect()->route('laundrie.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('laundrie.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $laundrie=laundrie::findOrFail($id);

    $laundrie->delete();

    if($laundrie){
        //pesan sukses
        return redirect()->route('laundrie.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('laundrie.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
