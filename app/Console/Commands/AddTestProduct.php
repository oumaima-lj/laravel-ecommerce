<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;

class AddTestProduct extends Command
{
    protected $signature = 'product:add-test';
    protected $description = 'Add a test product to the database';

    public function handle()
    {
        $user = User::first();

        if (!$user) {
            $this->error('No user found in the database. Please create a user first.');
            return;
        }

        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'This is a test product',
            'price' => 99.99,
            'stock' => 10,
            'user_id' => $user->id,
        ]);

        $this->info('Test product created successfully!');
    }
}
