<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Mahasiswa;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    

    function addData(Request $request){
        DB::beginTransaction();

        try{
            $this->validate($request, [
            'nama_mahasiswa' => 'required',
            'email_mahasiswa' => 'required|email',
            'alamat_mahasiswa' => 'required',
            'phone_mahasiswa' => 'required'
            ]);

            $name = $request->input('nama_mahasiswa');
            $alamat = $request->input('alamat_mahasiswa');
            $email = $request->input('email_mahasiswa');
            $phone = $request->input('phone_mahasiswa');

            if(isset($request->id)){

                $mahasiswa = Mahasiswa::find($request->input('id'));
                $mahasiswa->nama_mahasiswa = $name;
                $mahasiswa->alamat_mahasiswa = $alamat;
                $mahasiswa->email_mahasiswa = $email;
                $mahasiswa->phone_mahasiswa = $phone;
                $mahasiswa->save();

                $listMahasiswa = Mahasiswa::find($request->input('id'));
            }
            else{
                $newmahasiswa = new Mahasiswa;
                $newmahasiswa->nama_mahasiswa = $name;
                $newmahasiswa->alamat_mahasiswa = $alamat;
                $newmahasiswa->email_mahasiswa = $email;
                $newmahasiswa->phone_mahasiswa = $phone;
                $newmahasiswa->save();

                $listMahasiswa = Mahasiswa::orderBy('id', 'desc')->first();

            }

            DB::commit(); // data tidak akan di insert sebelum di commit
            return response()->json($listMahasiswa, 201);
        }
        catch(\Exception $e){

            DB::rollback(); //untuk rollback data ketika data yang dimasukkan mengalami kegagalan
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }


}
