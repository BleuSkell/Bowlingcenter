<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    // Product Name is a random product name
    protected static $productName = [
        'Snackpakket Basis',
        'Snackpakket Lux',
        'Kinderpartij',
        'Snackpakket Deluxe',
        'Snackpakket Premium',
        'Snackpakket Party',
        'Snackpakket Familie',
        'Snackpakket Student',
        'Snackpakket Business',
        'Snackpakket VIP',
        'Snackpakket Sport',
        'Snackpakket Gezond',
        'Snackpakket Vegetarisch',
        'Snackpakket Vegan',
        'Snackpakket Glutenvrij',
        'Snackpakket Suikervrij',
        'Snackpakket Keto',
        'Snackpakket Paleo',
        'Snackpakket Raw',
        'Snackpakket Organic',
        'Snackpakket Bio',
        'Snackpakket Fair Trade',
        'Snackpakket Local',
        'Snackpakket Seasonal',
        'Snackpakket Holiday',
        'Snackpakket Birthday',
        'Snackpakket Anniversary',
        'Snackpakket Graduation',
        'Snackpakket Wedding',
        'Snackpakket Corporate',
        'Snackpakket Team Building',
        'Snackpakket Event',
    ];

    protected static $imageUrl = [
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2FR7MMWZ2zRo4V%2Fz1ER32%2F1200x1200.jpg&f=1&nofb=1&ipt=3cba1f7932184c844eec5d837d959593533499605b96c4a1734a8cfb18dce2d5",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Foveresch.nl%2Fwp-content%2Fuploads%2F2022%2F09%2FVoorbeeldpakket-DSW-10-08-2022-1536x1124.jpg&f=1&nofb=1&ipt=1049e901cc85df7eec76e180cc4d47c0d5d5d43ba6473105e8e495c74fc3e0ec",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.makrokerstpakketten.nl%2FCmsData%2FArtikelen%2FFotos%2F2%2F0%2F2022%2520HS55%2520Kleurrijke%2520feestdagen%2Fv-637985847413403359%2F2022%2520HS55%2520Kleurrijke%2520feestdagen_main_349x349%402x_1.jpg&f=1&nofb=1&ipt=966e927addd853f5c9e3355ae75415864cc522dcc637bbc47dbf2649efd58de1",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.s-bol.com%2F33yBzVKA7GV9%2FgG6BV6%2F1121x1200.jpg&f=1&nofb=1&ipt=6b7332b905937e8676ca3586a7f5696a71294d5765b9ca127ec097e52cd656e4",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.whynot.com%2Fdeal%2Ffrietkraom-keulse-barriere-23072615582243.jpg&f=1&nofb=1&ipt=354d0e297333a66a93b3cc679fb7b078c46953db1df817f54a1b2ddbc6c10b09",
        "
        https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.lekkerensimpel.com%2Fwp-content%2Fuploads%2F2016%2F06%2FIMG_6045-640x426.jpg&f=1&nofb=1&ipt=3f2714c23ab454cb08c49b3fc9bfea55203448977752b895d0bf480fb9740687",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yummytoddlerfood.com%2Fwp-content%2Fuploads%2F2023%2F02%2Fvegetable-post-1024x683.jpg&f=1&nofb=1&ipt=8378225d0d47b4ff770d49a705dff0343c4523921a2ecd09102cf3f59139dc36",
        "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fglobal-uploads.webflow.com%2F5f6cc9cd16d59d990c8fca33%2F64335322a9dcdb6019df25cd_vegetarian-fast-food.jpg&f=1&nofb=1&ipt=8b69b09c980c7dbcd6dc72e8d4ab25749df79e3d6c93e91c77462c71f75a0a36"
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(self::$productName),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 1, 100),
            'stock' => fake()->numberBetween(1, 100),
            'image_url' => fake()->randomElement(self::$imageUrl),
            'max_quantity' => fake()->numberBetween(1, 10),
            'is_active' => fake()->boolean(),
            'comment' => fake()->optional()->sentence(),
        ];
    }
}