<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO users(id, nama_lengkap, username, email, password, no_telp, level_user) VALUES
        (1, 'Admin', 'admin', 'admin@gmail.com', '".bcrypt('admin')."', null, 'Admin'),
        (2, 'Pengguna', 'pengguna', 'pengguna@gmail.com', '".bcrypt('pengguna')."', '085749576759', 'Pengguna');");
    }
}
