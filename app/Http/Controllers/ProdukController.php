<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Produk';
        $data['page'] = 'produk';
        $data['menu'] = 'index';
        $data['produks'] = Produk::all();
        return view('admin.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Produk';
        $data['page'] = 'produk';
        $data['menu'] = 'create';
        $data['categories'] = Kategori::all();
        return view('admin.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'foto' => ['required', 'image', 'mimes:jpg,png,gif,webp', 'max:1000'],
                'nama' => ['required', 'string', 'max:50'],
                'harga' => ['required'],
                'deskripsi' => ['required'],
                'kategori_id' => ['required', 'numeric']
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            $data['harga'] = str_replace(',', '', $request->harga);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('produk', $filename);
                $data['foto'] = $path;
            }
            Produk::create($data);
            DB::commit();
            return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan Data');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $data['title'] = 'Edit Produk';
        $data['page'] = 'produk';
        $data['menu'] = 'index';
        $data['categories'] = Kategori::all();
        $data['produk'] = $produk;
        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'foto' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:1000'],
                'nama' => ['required', 'string', 'max:50'],
                'harga' => ['required'],
                'deskripsi' => ['required'],
                'kategori_id' => ['required', 'numeric']
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            $data['harga'] = str_replace(',', '', $request->harga);

            if ($request->hasFile('foto')) {
                if($produk->foto && Storage::exists($produk->foto)){
                    Storage::delete($produk->foto);
                }
                $file = $request->file('foto');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('produk', $filename);
                $data['foto'] = $path;
            } else {
                unset($data['foto']);
            }

            $produk->update($data);
            DB::commit();
            return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan Data');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            DB::beginTransaction();
            if($produk->foto && Storage::exists($produk->foto)){
                Storage::delete($produk->foto);
            }
            $produk->delete();
            DB::commit();
            return redirect()->back()->with('success','Berhasil Menghapus Data !');
         } catch (\Throwable $th) {
             DB::rollback();
             Log::debug('ProdukController::destroy() '.$th->getMessage());
             return redirect()->back()->with('success','Terjadi Masalah !');
         }
    }
}