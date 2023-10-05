<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Checkout;
use App\Models\DetailCheckout;
use App\Models\Kabupaten;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Provinsi;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $judul = 'Checkout';
    protected $menu = 'checkout';
    protected $sub_menu = '';
    protected $direktori = 'user.checkout';

    public function index(Request $request)
    {
        $id = $request->id;

        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $data['keranjang'] = Keranjang::find($id);
        // dd($data['keranjang']);
        $data['user'] = Users::find($data['keranjang']->user_id);
        // dd($data['user']);
        $data['keranjang1'] = Keranjang::with('produk')->where('user_id', Auth::id())->get();
        $data['alamat'] = Alamat::where('user_id', Auth::id())->first();
        // dd($data['alamat']);
        $data['kabupaten'] = Kabupaten::find($data['alamat']->kabupaten_id);
        // dd($data['kabupaten']);
        $data['provinsi'] = Provinsi::find($data['alamat']->provinsi_id);
        $data['produk'] = Produk::with('kategori_produk')
                                ->find($data['keranjang']->produk_id)->get();
        // dd($data['keranjang1']);

        return view($this->direktori . '.main', $data);
    }

    public function proses(Request $request)
    {
        $id_user = $request->id_user;
        $id_keranjang = $request->id_keranjang;
        $id_alamat = $request->id_alamat;
        $ekspedisi = $request->ekspedisi;
        $tanggal_checkout = date('Y-m-d');
        $catatan_pembeli = $request->catatan_pembeli;

        if (empty($id_user)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Pembeli Harus Diisi');
        }
        if (empty($id_keranjang)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Keranjang Harus Diisi');
        }
        if (empty($id_alamat)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Alamat Harus Diisi');
        }
        if (empty($tanggal_checkout)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Tanggal Transaksi Harus Diisi');
        }
        if (empty($ekspedisi)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kolom Ekspedisi Pembeli Harus Diisi');
        }
        if (empty($catatan_pembeli)) {
            $catatan_pembeli = '-';
        }

        $users = Users::find('id_user');
        $keranjang = Keranjang::find('id_keranjang')->get();
        $alamat = Alamat::find('id_alamat');
        $checkout = Checkout::orderBy('id_checkout', 'DESC')->first();
        if (!$checkout) {
            $kode_checkout = ' TR-0001';
        } else {
            $kode_checkout = 'TR-000' . ((int) substr($checkout->kode_checkout, 6) + 1);
        }

        // foreach ($keranjang as $key => $kj) {

        //     $checkout = Checkout::orderBy('id_checkout', 'DESC')->first();
        //     if (!$checkout) {
        //         $kode_checkout = ' TR-0001';
        //     } else {
        //         $kode_checkout = 'TR-000' . ((int) substr($checkout->kode_checkout, 6) + 1);
        //     }

        //     $checkout = new Checkout();
        //     $checkout->kode_checkout = $kode_checkout;
        //     $checkout->kode_invoice = '-';

        //     $checkout->user_id = $id_user;
        //     $checkout->tanggal_transaksi = date('Y-m-d', strtotime($tanggal_transaksi));
        //     $checkout->status_transaksi = 'Pending';

        //     $checkout->provinsi_id = $alamat->provinsi_id;
        //     $checkout->kabupaten_id = $alamat->kabupaten_id;
        //     $checkout->kode_pos = $alamat->kode_pos;
        //     $checkout->alamat_lengkap = $alamat->alamat_lengkap;

        //     $checkout->transaksi = $ekspedisi;
        //     $checkout->catatan_pembeli = $catatan_pembeli;
        //     $checkout->save();

        //     if ($checkout) {
        //         $checkout = Checkout::where('id_checkout', $checkout->id_checkout)->first();
        //         $checkout->kode_invoice = date('dmY') . " " . $checkout->id_checkout;
        //         $checkout->save();

        //         $checkout_detail = new DetailCheckout();
        //         $checkout_detail->checkout_id = $checkout->id_checkout;
        //         $checkout_detail->produk_id = $kj->produk_id;
        //         $checkout_detail->qty = $kj->qty;
        //         $checkout_detail->save();

        //         if ($checkout_detail) {
        //             $produk = Produk::where('id_produk', $kj->produk_id)->first();
        //             $produk->stok_produk = ($produk->stok_produk - 1);
        //             $produk->save();
        //         }
        //     }
        //     if ($checkout) {
        //         return redirect()->route('userDashboard')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
        //     } else {
        //         return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
        //     }

        // }
        foreach ($keranjang as $keranjanguser) {
            $checkout = new Checkout();
            $checkout->kode_checkout = $kode_checkout;
            $checkout->kode_invoice = '-';
            $checkout->user_id = $id_user;
            $checkout->tanggal_checkout = date('Y-m-d', strtotime($tanggal_checkout));
            $checkout->status_transaksi = 'Pending';
            $checkout->transaksi = $ekspedisi;
            $checkout->catatan_pembeli = $catatan_pembeli;
            $checkout->save();

            if ($checkout) {
                $checkout = Checkout::where('id_checkout', $checkout->id_checkout)->first();
                $checkout->kode_invoice = date('dmY') . " " . $checkout->id_checkout;
                $checkout->save();

                $checkout_detail = new DetailCheckout();
                $checkout_detail->checkout_id = $checkout->id_checkout;
                $checkout_detail->produk_id = $keranjanguser->produk_id;
                $checkout_detail->qty = $keranjanguser->qty;
                $checkout_detail->save();

                if ($checkout_detail) {
                    $produk = Produk::where('id_produk', $keranjanguser->produk_id)->decrement('qty', $keranjanguser->qty);
                    // $produk->stok_produk = ($produk->stok_produk - 1);
                    $produk->save();
                }
            }

            if ($checkout) {
                return redirect()->route('userDashboard')->with('status', 'success')->with('message', 'Berhasil Menyimpan Data');
            } else {
                return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Data');
            }
        }

    }
}
