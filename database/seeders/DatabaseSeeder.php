<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Staff;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'staff@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'staff'
        ]);

        Category::create([
            'name_category' => 'Makanan',
            'slug_category' => 'makanan',
        ]);

        Category::create([
            'name_category' => 'Minuman',
            'slug_category' => 'minuman',
        ]);

        Product::create([
            'code_product' => '2017319',
            'id_category' => '1',
            'name_product' => 'Pillow',
            'slug_product' => 'pillow',
            'price' => '2000',
        ]);

        Product::create([
            'code_product' => '2849224',
            'id_category' => '1',
            'name_product' => 'Chiki Roll',
            'slug_product' => 'chiki-roll',
            'price' => '3500',
        ]);

        Product::create([
            'code_product' => '2421341',
            'id_category' => '2',
            'name_product' => 'Mizone',
            'slug_product' => 'mizone',
            'price' => '5000',
        ]);

        Supplier::create([
            'name' => 'Rudy Tabuti',
            'address' => 'Jl. Gunung Sekar',
            'phone' => '0887187281',
           
        ]);

        Staff::create([
            'user_id' => '2',
            'username' => 'rambo',
            'phone' => '0887187281',
            'address' => 'Jl. Gunung gunung',
           
        ]);

        Admin::create([
            'user_id' => '1',
            'username' => 'admin',
           
        ]);

    }
}
