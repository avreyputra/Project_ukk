<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $judul = 'Produk';
    protected $menu = 'data_produk';
    protected $sub_menu = 'produk';
    protected $directory = 'admin.data_produk.produk';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['produk'] = Produk::with(['kategori_produk'])->orderBy('created_at', 'DESC')->get();

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

        $data['kategori_produk'] = KategoriProduk::all();

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
        $nama_produk = $request->nama_produk;
        $id_kategori_produk = $request->id_kategori_produk;
        $stok_produk = $request->stok_produk;
        $ukuran_sandal = $request->ukuran_sandal;
        $harga_produk = $request->harga_produk;
        $deskripsi_produk = $request->deskripsi_produk;
        $foto_produk = $request->foto_produk;

        //pengecekan
        if (empty($nama_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Nama Produk Harus Diisi');
        }
        if (empty($id_kategori_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Kategori Produk Harus Diisi');
        }
        if (empty($stok_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Stok Harus Diisi');
        }
        if (empty($ukuran_sandal)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Berat Produk Harus Diisi');
        }
        if (empty($harga_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Harga Harus Diisi');
        }
        if (empty($deskripsi_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Deskripsi Harus Diisi');
        }
        if (empty($foto_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Foto Harus Diisi');
        }

        //simpan
        $produk = new Produk();
        $produk->nama_produk = $nama_produk;
        $produk->slug_produk = Str::slug($nama_produk);
        $produk->kategori_produk_id = $id_kategori_produk;
        $produk->stok_produk = $stok_produk;
        $produk->ukuran_sandal = $ukuran_sandal;
        $produk->harga_produk = $harga_produk;
        $produk->deskripsi_produk = $deskripsi_produk;

        $nama_foto = str_replace([' ', '/'], '-', $nama_produk);
        $ext_foto = $foto_produk->getClientOriginalExtension();
        $filename = $nama_foto . "-" . date('Ymdhis') . "." . $ext_foto;
        $temp_foto = 'template/assets/images/produk';
        $proses = $foto_produk->move($temp_foto, $filename);

        $produk->foto_produk = $filename;
        $produk->save();

        if ($produk) {
            return redirect()->route('Produk')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
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
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_produk'] = KategoriProduk::all();
        $data['produk'] = Produk::where('id_produk', $id)->first();

        return view($this->directory . '.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['kategori_produk'] = KategoriProduk::all();
        $data['produk'] = Produk::where('id_produk', $id)->first();

        return view($this->directory . '.edit', $data);
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
        $nama_produk = $request->nama_produk;
        $id_kategori_produk = $request->id_kategori_produk;
        $stok_produk = $request->stok_produk;
        $ukuran_sandal = $request->ukuran_sandal;
        $harga_produk = $request->harga_produk;
        $deskripsi_produk = $request->deskripsi_produk;
        $foto_produk = $request->foto_produk;

        //pengecekan
        if (empty($nama_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Nama Kategori Harus Diisi');
        }
        if (empty($id_kategori_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Kategori Harus Diisi');
        }
        if (empty($stok_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Stok Kategori Harus Diisi');
        }
        if (empty($ukuran_sandal)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Berat Kategori Harus Diisi');
        }
        if (empty($harga_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Harga Kategori Harus Diisi');
        }
        if (empty($deskripsi_produk)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Deskripsi Kategori Harus Diisi');
        }


        //simpan
        $produk = Produk::where('id_produk', $id)->first();
        $produk->nama_produk = $nama_produk;
        $produk->slug_produk = Str::slug($nama_produk);
        $produk->kategori_produk_id = $id_kategori_produk;
        $produk->stok_produk = $stok_produk;
        $produk->ukuran_sandal = $ukuran_sandal;
        $produk->harga_produk = $harga_produk;
        $produk->deskripsi_produk = $deskripsi_produk;

        if (isset($foto_produk)) {
            if (!empty($foto_produk) && $foto_produk != '0') {
                if (!empty($produk) && $produk != '') {
                    $path = "template/assets/images/produk/" . $produk->foto_produk;
                    if (file_exists($path)) {
                        unlink($path); //menghapus foto dari direktori
                    }
                }
                $nama_foto = str_replace([' ', '/'], '-', $nama_produk);
                $ext_foto = $foto_produk->getClientOriginalExtension();
                $filename = $nama_foto . "-" . date('Ymdhis') . "." . $ext_foto;
                $temp_foto = 'template/assets/images/produk';
                $proses = $foto_produk->move($temp_foto, $filename);
            }
        }
        $produk->foto_produk = $filename;
        $produk->save();

        if ($produk) {
            return redirect()->route('Produk')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
        } else {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id_produk', $id)->first();
        if (!empty($produk)) {
            if ($produk->foto_produk != '') {
                $path = 'template/assets/images/produk/' . $produk->foto_produk;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $produk->delete();

            return redirect()->route('Produk')->with('status', 'success')->with('message', 'Berhasil Menghapus Data Produk');
        } else {
            return redirect()->route('Produk')->with('status', 'error')->with('message', 'Gagal Menghapus Data');
        }
    }
}
