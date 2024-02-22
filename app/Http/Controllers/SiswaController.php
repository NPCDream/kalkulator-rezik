<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //
    public function index(){
        $siswas=Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    public function create()
 {
 return view('siswa.create');
  }
 public function store(Request $request)
 {
  $this->validate($request,[
    'nis30'=>'required',
    'nama30'=>'required',
    'jenis_kelamin30'=>'required',
    'kelas30'=>'required',
    'jurusan30'=>'required',
    'alamat30'=>'required',
  ]);
  DB::table('siswas')->insert([
    'nis30'=>$request->nis30,
    'nama30'=>$request->nama30,
    'jenis_kelamin30'=>$request->jenis_kelamin30,
    'kelas30'=>$request->kelas30,
    'jurusan30'=>$request->jurusan30,
    'alamat30'=>$request->alamat30,
  ]);
  if(DB::table('siswas')){
    return redirect()->route('siswa.index')->with(['success'=>'Data berhasil disimpan']);
 }else{
    return redirect()->route('siswa.index')->with(['error'=>'Data gagal disimpan']);
 }
}

public function edit(Siswa $siswa)
{
return view('siswa.edit', compact('siswa'));
}
public function update(Request $request, Siswa $siswa)
{
$this->validate($request, [
    'nis30' => 'required',
    'nama30' => 'required',
    'jenis_kelamin30' => 'required',
    'kelas30' => 'required',
    'jurusan30' => 'required',
    'alamat30' => 'required',
]);
//get data mapel by ID
$siswa=Siswa::findOrFail($siswa->id);
$siswa->update([
    'nis30'=>$request->nis30,
    'nama30'=>$request->nama30,
    'jenis_kelamin30'=>$request->jenis_kelamin30,
    'kelas30'=>$request->kelas30,
    'jurusan30'=>$request->jurusan30,
    'alamat30'=>$request->alamat30,
]);
if($siswa){
//redirect dengan pesan sukses
return redirect()->route('siswa.index')->with(['success'=>'Data berhasil disimpan']);
}else{
return redirect()->route('siswa.index')->with(['error'=>'Data gagal disimpan']);
}
}

public function destroy($id)
{
    $siswas=Siswa::findOrFail($id);

    $siswas->delete();

    if($siswas){
        //pesan sukses
        return redirect()->route('siswa.index')->with(['success' => 'Data berhasil dihapus']);
    }else{
        //pesan gagal
        return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus']);
    }
}
}
