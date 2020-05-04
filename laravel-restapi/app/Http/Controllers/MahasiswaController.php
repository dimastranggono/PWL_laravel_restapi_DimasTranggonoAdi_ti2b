<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    //fungsi index digunakan untuk menampilkan semua data mahasiswa
    public function index(){
        $data= Mahasiswa::all();
        
    //cek data jika tidak kosong
        if(count($data)>0){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        
        }
    //jika data kosong
        else{
            $res['message'] = "Kosong!";
            return response($res);
        }    

    }

    //fungsi untuk menampilkan  data dari sebuah ID
    public function getId($id){

        $data = Mahasiswa::where('id',$id)->get();

        //cek jika data ditemukan 
        if(count($data)>0){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message']="Gagal!";
            return response($res);
        }
    }

    //Fungsi tambah data
    public function create(Request $request){
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->jurusan;
        $mhs->jurusan = $request->email;
    
        //jika data berhasil tersimpan
        if($mhs->save()){
            $res['message'] = "Data berhasil ditambah";
            $res['value'] = "$mhs";
            return response($res);
        }

    }
    public function update(Request $request, $id){
        $nama = $request -> nama;
        $nim = $request -> nim;
        $email = $request -> email;
        $jurusan = $request -> jurusan;

        $mhs = Mahasiswa::find($id);
        $mhs->nama = $nama;
        $mhs->nim = $nim;
        $mhs->email = $email;
        $mhs->jurusan = $jurusan;

        if($mhs->save()){
            $res['message'] = "Data berhasil ditambah!";
            $res['value'] = "$mhs";
            return response($res);
            
        }
        else{
            $res['message']="Gagal!";
            return response($res);
        }

    }

    public function delete($id){
        $mhs = Mahasiswa::where('id',$id);


        if($mhs->delete()){
            $res['message'] = "Data berhasil dihapus!";
            return response($res);
        }else{
            $res['message'] = "Gagal!";
            return response($res);
        }
    }


}
