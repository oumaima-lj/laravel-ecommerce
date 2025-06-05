<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user to be the product owner
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create();
        }

        $products = [
            [
                'name' => 'Premium Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation and premium sound quality.',
                'image' => 'products/headphones.jpg',
                'price' => 199.99,
                'stock' => 50,
            ],
            [
                'name' => 'Smart Watch',
                'description' => 'Feature-rich smartwatch with health monitoring and fitness tracking capabilities.',
                'image' => 'products/smartwatch.jpg',
                'price' => 299.99,
                'stock' => 30,
            ],
            [
                'name' => 'Wireless Earbuds',
                'description' => 'True wireless earbuds with long battery life and crystal clear sound.',
                'image' => 'products/earbuds.jpg',
                'price' => 149.99,
                'stock' => 100,
            ],
            [
                'name' => 'Laptop Backpack',
                'description' => 'Durable and spacious laptop backpack with multiple compartments.',
                'image' => 'products/backpack.jpg',
                'price' => 79.99,
                'stock' => 75,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB mechanical keyboard with customizable keys and premium switches.',
                'image' => 'products/keyboard.jpg',
                'price' => 129.99,
                'stock' => 40,
            ],
            [
                'name' => 'Gaming Mouse',
                'description' => 'High-precision gaming mouse with adjustable DPI and programmable buttons.',
                'image' => 'products/mouse.jpg',
                'price' => 89.99,
                'stock' => 60,
            ],
            [
                'name' => 'Portable Charger',
                'description' => '20000mAh portable power bank with fast charging capability.',
                'image' => 'products/charger.jpg',
                'price' => 49.99,
                'stock' => 120,
            ],
            [
                'name' => 'Bluetooth Speaker',
                'description' => 'Waterproof Bluetooth speaker with 360° sound and 20-hour battery life.',
                'image' => 'products/speaker.jpg',
                'price' => 119.99,
                'stock' => 45,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'image' => $product['image'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'user_id' => $user->id,
            ]);
        }
    }
}
