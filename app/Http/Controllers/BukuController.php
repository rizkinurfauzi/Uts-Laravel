<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function index(){
        $bukus= Buku::all();
        
        return view('Buku.index',compact('bukus')); 

    }
    public function create(){
        return view('Buku.create');
    }
    public function store(Request $request){
        Buku::create([
            'judulBuku' => $request -> judulBuku,
            'penulis' => $request -> penulis,
            'penerbit' =>$request -> penerbit
        ]);
        return redirect() ->route('buku.index');
    }
    public function destroy($id){
        $buku = Buku::findOrFail($id);
        // dd($buku);
        $buku -> delete();
        return redirect() ->route('buku.index');

        
    }
    public function edit($id){
        $buku = Buku::findOrFail($id);
        return view('Buku.edit',compact('buku')); 
    }
    public function update(Request $request,$id){
        $buku = Buku::findOrFail($id);
        $buku -> update([
            'judulBuku' => $request -> judulBuku,
            'penulis' => $request -> penulis,
            'penerbit' =>$request -> penerbit


        ]);
        return redirect() ->route('buku.index');

    }
}
