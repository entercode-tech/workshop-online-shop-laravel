<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Kategori;
use App\Helper\FormHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Kategori';
        $data['page'] = 'kategori';
        return view('admin.kategori',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
           $validator = Validator::make($request->all(),[
               'nama'=>['required']
           ]);
           if ($validator->fails()) {
               return FormHelper::response_json(false,'Input Tidak Valid',$validator->errors(),401);
           }
           $data = $validator->validated();
           Kategori::create($data);
           return FormHelper::response_json(true,'Berhasil Menyimpan Data',$request->all(),200);
        } catch (Throwable $th) {
            Log::debug('KategoriController::store() '.$th->getMessage());
            return FormHelper::response_json(false,'Terjadi Masalah',$th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}