<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Order;
use App\Models\OrdersVariants;
use App\Models\OrderVariant;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Categories
        $categories = collect();
        for ($i = 0; $i < 5; $i++) {
            $categories->push(ProductCategory::create([
                'name' => fake()->unique()->word(),
                
            ]));
        }

        // 2. Create Users with Stores and Products
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => bcrypt('password'),
            ]);

            // Give 50% of users a store
            if (fake()->boolean()) {
                $store = Store::create([
                    'name' => fake()->company(),
                    'description' => fake()->sentence(),
                    'user_id' => $user->id,
                    'image_url' => fake()->imageUrl(),
                ]);

                // Create Products for the Store
                for ($p = 0; $p < 3; $p++) {
                    $product = Product::create([
                        'store_id' => $store->id,
                        'category_id' => $categories->random()->id,
                        'name' => fake()->words(3, true),
                        'description' => fake()->sentence(),
                        
                    ]);

                    // Each product gets 2 variants
                    for ($v = 0; $v < 2; $v++) {
                        ProductVariant::create([
                            'product_id' => $product->id,
                            'name' => fake()->word(),
                            'image_url' => fake()->imageUrl(),
                            'stock_quantity' => rand(10, 100),
                            'price' => rand(10,100),
                        ]);
                    }
                }
            }
        }

        // 3. Create Orders for existing Users
        foreach (User::all() as $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0 // Will update after adding items
            ]);

            $variants = ProductVariant::inRandomOrder()->take(2)->get();
            $total = 0;

            foreach ($variants as $variant) {
                $qty = rand(1, 3);
                $subtotal = $variant->price * $qty;

                OrdersVariants::create([
                    'order_id' => $order->id,
                    'product_id' => $variant->id,
                    'quantity' => $qty,
                    'product_name_at_purchase' => $variant->product->name . " ({$variant->name})",
                    'price_at_purchase' => $variant->price,
                ]);
                $total += $subtotal;
            }

            $order->update(['total_price' => $total]);
        };
    }
}