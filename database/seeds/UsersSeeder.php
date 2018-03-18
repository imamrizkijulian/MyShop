<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role admin 
        $adminRole = new Role(); 
        $adminRole->name = "admin"; 
        $adminRole->display_name = "Admin"; 
        $adminRole->save();

        // Membuat role member 
        $kasirRole = new Role(); 
        $kasirRole->name = "karyawan1"; 
        $kasirRole->display_name = "Karwan1"; 
        $kasirRole->save();

        // Membuat role member 
        $kasirRole = new Role(); 
        $kasirRole->name = "karyawan2"; 
        $kasirRole->display_name = "Karwan2"; 
        $kasirRole->save();

        // Membuat sample admin 
        $admin = new User(); 
        $admin->name = 'Admin'; 
        $admin->email = 'admin@gmail.com'; 
        $admin->password = bcrypt('rahasia'); 
        $admin->save(); 
        $admin->attachRole($adminRole);

        // Membuat sample member 
        $kasir = new User(); 
        $kasir->name = "Karyawan1"; 
        $kasir->email = 'karyawan1@gmail.com'; 
        $kasir->password = bcrypt('rahasia'); 
        $kasir->save(); 
        $kasir->attachRole($kasirRole);


    }
}
