<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
      \App\Models\Customer::factory(100)->hasInvoices(50)->create();
      \App\Models\Customer::factory(10)->hasInvoices(10)->create();
      \App\Models\Customer::factory(80)->hasInvoices(40)->create();


    }
}
