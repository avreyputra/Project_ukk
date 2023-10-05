<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    /**l
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $judul = 'Kategori Produk';
     protected $menu = 'data_produk';
     protected $sub_menu = 'kategori_produk';
     protected $directory = 'admin.data_produk.kategori_produk';
    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['kategori_produk'] = KategoriProduk::orderBy('created_at', 'DESC')->get();

        return view($this->directory.'.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        return view($this->directory . '.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_kategori_produk = $request->nama_kategori_produk;

        //pengecekan
        if(empty($nama_kategori_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Nama Kategori Harus Diisi');
        }

        //simpan
        $kategori_produk = new KategoriProduk();
        $kategori_produk->nama_kategori_produk = $nama_kategori_produk;
        $kategori_produk->slug_kategori_produk = Str::slug($nama_kategori_produk);
        $kategori_produk->save();

        if ($kategori_produk) {
            return redirect()->route('kategoriProduk')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori_produk = KategoriProduk::where('id_kategori_produk', $id)->first();

        if (!empty($kategori_produk)) {
            $kategori_produk->delete();

            return redirect()->route('kategoriProduk')->with('status', 'success')->with('message', 'Berhasil Menghapus Data');
        } else {
            return redirect()->route('kategoriProduk')->with('status', 'error')->with('message', 'Gagal Menghapus Data');
        }

            // dd($id);
    }
}
