<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    protected $judul = 'Dashboard';
    protected $menu = 'dashboard';
    protected $sub_menu = '';
    protected $direktori = 'user.dashboardUser';

    public function main(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['produk'] = Produk::with(['kategori_produk'])->orderBy('created_at', 'DESC')->take(5)->get();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();
        // dd($data['keranjang']);

        return view($this->direktori . '.main', $data);
    }

}
