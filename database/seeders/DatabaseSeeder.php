<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Category::factory(10)->create();
        // Product::factory(50)->create();
        Transaction::factory(50)->create();
        DetailTransaction::factory(100)->create();
    }
}
