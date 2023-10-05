<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProdukController extends Controller
{
    protected $judul = 'Produk';
    protected $menu = 'produk';
    protected $sub_menu = '';
    protected $direktori = 'user.userProduk';

    public function main(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['produk'] = Produk::with(['kategori_produk'])->orderBy('created_at', 'DESC')->get();
        $data['kategori_produk'] = KategoriProduk::with('produk')->get();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();


        return view($this->direktori . '.main', $data);
    }

    public function index(Request $request, $id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['produk'] = Produk::with(['kategori_produk'])->where('id_produk', $id)->first();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();


        return view($this->direktori . '.index', $data);
    }

    public function addToCart(Request $request, $id)
    {

        // $id = Produk::first();
        $data['produk'] = Produk::where('id_produk', $id)->first();
        $kuantitas = $request->kuantitas;
        // dd($data['produk']);

        if (Auth::check()) {
            $check_keranjang = Keranjang::where('produk_id', $id)
            ->where('user_id', Auth::id())->first();
            // dd($check_keranjang);

            if ($check_keranjang) {
                $check_keranjang->qty = $check_keranjang->qty + $kuantitas;
            } else {
                $check_keranjang = new Keranjang();
                $check_keranjang->produk_id = $id;
                $check_keranjang->qty = $kuantitas;
                $check_keranjang->user_id = Auth::id();
            }
            $check_keranjang->save();
            // dd($check_keranjang);

            if ($check_keranjang) {
                return redirect()->route('ProductUser', $data['produk']->id_produk)
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Produk Ke Keranjang');
            } else {
                return redirect()->route('ProductUser', $data['produk']->id_produk)
                ->with('status', 'error')
                ->with('message', 'Gagal Menambah Data Ke Keranjang');
            }
        } else {
            return redirect()->route('ProductUser', $data['produk']->id_produk)
            ->with('status', 'error')
            ->with('message', 'Anda Belum Login');
        }

    }

    public function removeToCart(Request $request)
    {
        $id = $request->id;

        if (Auth::check()) {
            $check_keranjang = Keranjang::where('produk_id', $id)
                                        ->where('user_id', Auth::id())
                                        ->first();
            $check_keranjang->delete();

            if ($check_keranjang) {
                return redirect()->route('userDashboard')
                                ->with('status', 'success')
                                ->with('message', 'Berhasil Menghapus Produk');
            } else {
                return redirect()->route('userDashboard')
                                ->with('status', 'error')
                                ->with('message', 'Gagal Menghapus Produk');
            }

        } else {
            return redirect()->route('userDashboard')
                            ->with('status', 'error')
                            ->with('message', 'Anda Belum Login');
        }

    }
}
