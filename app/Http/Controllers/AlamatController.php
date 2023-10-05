<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Kabupaten;
use App\Models\Keranjang;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    protected $judul = 'Alamat';
    protected $menu = 'alamat';
    protected $sub_menu = '';
    protected $direktori = 'user.Alamat';

    public function akun(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;

        $akun_login_id = Auth::id();
        $pengguna = Alamat::where('user_id', $akun_login_id)->first();

        $data['alamat'] = Alamat::where('user_id', $akun_login_id)->first();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();

        if($data['alamat'] != null) {
            $data['akun_login_id'] = "ada";
            $data['kabupaten'] = Kabupaten::where('id_kabupaten', $pengguna->kabupaten_id)->first();
            $data['provinsi'] = Provinsi::where('id_provinsi', $pengguna->provinsi_id)->first();
        } else {
            $data['akun_login_id'] = "tidak-ada";
        }

        return view($this->direktori . '.account', $data);
    }

    public function main()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['provinsi'] = Provinsi::all();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();

        return view($this->direktori . '.alamat', $data);
    }

    public function getKabupaten(Request $request)
    {
        $kabupaten = Kabupaten::where('id_provinsi', $request->id_provinsi)->get();

        if($kabupaten->count() > 0) {
            return ['status' => 'success', 'code' => 200, 'message' => 'Berhasil Menyimpan Data', 'data' => $kabupaten];
        } else {
            return ['status' => 'error', 'code' => 500, 'message' => 'Gagal Menyimpan Data', 'data' => $kabupaten];
        }
    }

    public function store(Request $request)
    {
        //pengecekan
        $provinsi_id = $request->provinsi;
        $kabupaten_id = $request->kabupaten;
        $kode_pos = $request->kode_pos;
        $alamat_lengkap = $request->alamat_lengkap;

        if (empty($provinsi_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Provinsi Harus Diisi');
        }
        if (empty($kabupaten_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kabupaten Harus Diisi');
        }
        if (empty($kode_pos)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kode Pos Harus Diisi');
        }
        if (empty($alamat_lengkap)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Alamat Lengkap Harus Diisi');
        }

        //simpan
        $alamat = new Alamat();
        $alamat->provinsi_id = $provinsi_id;
        $alamat->kabupaten_id = $kabupaten_id;
        $alamat->user_id = Auth::user()->id;
        $alamat->kode_pos = $kode_pos;
        $alamat->alamat_lengkap = $alamat_lengkap;
        $alamat->save();

        if ($alamat) {
            return redirect()->route('myAccount')->with('status', 'success')->with('message', 'Berhasil Menyimpan Alamat');
        } else {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Alamat');
        }
    }

    public function edit($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['sub_menu'] = $this->sub_menu;
        $data['alamat'] = Alamat::where('id_alamat', $id)->first();
        $data['provinsi'] = Provinsi::all();
        $data['keranjang'] = Keranjang::where('user_id', Auth::id())->first();
        // dd($data['alamat']);

        return view($this->direktori . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $provinsi_id = $request->provinsi;
        $kabupaten_id = $request->kabupaten;
        $kode_pos = $request->kode_pos;
        $alamat_lengkap = $request->alamat_lengkap;

        if (empty($provinsi_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Provinsi Harus Diisi');
        }
        if (empty($kabupaten_id)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kabupaten Harus Diisi');
        }
        if (empty($kode_pos)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Kode Pos Harus Diisi');
        }
        if (empty($alamat_lengkap)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Alamat Lengkap Harus Diisi');
        }

        $alamat = Alamat::where('id_alamat', $id)->first();
        $alamat->provinsi_id = $provinsi_id;
        $alamat->kabupaten_id = $kabupaten_id;
        $alamat->kode_pos = $kode_pos;
        $alamat->alamat_lengkap = $alamat_lengkap;
        $alamat->save();

        if ($alamat) {
            return redirect()->route('myAccount')->with('status', 'success')->with('message', 'Berhasil Menyimpan Alamat');
        } else {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Menyimpan Alamat');
        }
    }

}
