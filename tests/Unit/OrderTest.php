<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\User;

// Read

test('orders can be viewed by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $orders = Order::factory()->count(3)->create();

    $response = $this->get(route('orders.index'));

    $response->assertStatus(200);
    $response->assertViewIs('orders.index');
    $response->assertViewHas('orders', function ($viewOrders) use ($orders) {
        return $viewOrders->contains($orders->first());
    });
});

test('orders can not be viewed by user, redirect to dashboard', function () {
    $user = User::factory()->create();
    $user->role = 'user';
    $this->actingAs($user);

    $response = $this->get(route('orders.index'));
    $response->assertRedirect(route('dashboard'));
});

// Create
test('orders can be created by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $orderData = [
        'user_id' => $user->id,
        'product_id' => Product::factory()->create()->id,
        'reservation_id' => Reservation::factory()->create()->id,
        'quantity' => 1,
        'total_price' => 100,
    ];

    $response = $this->post(route('orders.store'), $orderData);

    $response->assertRedirect(route('orders.index'));
    $response->assertSessionHas('success', 'Order created successfully');
});