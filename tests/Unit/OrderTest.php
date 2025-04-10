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
    $response->assertStatus(401);
});

// Create
test('orders can be created by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $orderData = Order::factory()->make()->toArray();

    $response = $this->post(route('orders.store'), $orderData);

    $response->assertStatus(302);
    $response->assertRedirect(route('orders.index'));
    $this->assertDatabaseHas('orders', [
        'product_id' => $orderData['product_id'],
        'reservation_id' => $orderData['reservation_id'],
        'quantity' => $orderData['quantity'],
    ]);
});

test('orders can not be created by user, redirect to dashboard', function () {
    $user = User::factory()->create();
    $user->role = 'user';
    $this->actingAs($user);

    $orderData = Order::factory()->make()->toArray();

    $response = $this->post(route('orders.store'), $orderData);

    $response->assertStatus(401);
    $this->assertDatabaseMissing('orders', [
        'product_id' => $orderData['product_id'],
        'reservation_id' => $orderData['reservation_id'],
        'quantity' => $orderData['quantity'],
        'total_price' => $orderData['total_price'],
    ]);
});

// Edit
test('orders can be edited by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $order = Order::factory()->create();

    $response = $this->get(route('orders.edit', $order));

    $response->assertStatus(200);
    $response->assertViewIs('orders.edit');
    $response->assertViewHas('order', $order);
});

test('orders can not be edited by user, redirect to dashboard', function () {
    $user = User::factory()->create();
    $user->role = 'user';
    $this->actingAs($user);

    $order = Order::factory()->create();

    $response = $this->get(route('orders.edit', $order));

    $response->assertStatus(401);
});

test('orders can be updated by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $order = Order::factory()->create();

    $orderData = Order::factory()->make()->toArray();

    $response = $this->put(route('orders.update', $order), $orderData);

    $response->assertStatus(302);
    $response->assertRedirect(route('orders.index'));
    $this->assertDatabaseHas('orders', [
        'product_id' => $orderData['product_id'],
        'reservation_id' => $orderData['reservation_id'],
        'quantity' => $orderData['quantity'],
        'total_price' => $orderData['total_price'],
    ]);
});

test('orders can not be updated by user, redirect to dashboard', function () {
    $user = User::factory()->create();
    $user->role = 'user';
    $this->actingAs($user);

    $order = Order::factory()->create();

    $orderData = Order::factory()->make()->toArray();

    $response = $this->put(route('orders.update', $order), $orderData);

    $response->assertStatus(401);
    $this->assertDatabaseMissing('orders', [
        'product_id' => $orderData['product_id'],
        'reservation_id' => $orderData['reservation_id'],
        'quantity' => $orderData['quantity'],
        'total_price' => $orderData['total_price'],
    ]);
});

// Delete
test('orders can be deleted by admin', function () {
    $user = User::factory()->create();
    $user->role = 'admin';
    $this->actingAs($user);

    $order = Order::factory()->create();

    $response = $this->delete(route('orders.destroy', $order));

    $response->assertStatus(302);
    $response->assertRedirect(route('orders.index'));
    $this->assertDatabaseMissing('orders', [
        'id' => $order->id,
    ]);
});