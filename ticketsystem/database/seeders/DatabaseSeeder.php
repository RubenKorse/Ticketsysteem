<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\models\Event;
use App\models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
 public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@curio.nl',
            'password' => Hash::make('password'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@curio.nl',
            'password' => Hash::make('password'),
            'admin' => false,
        ]);

        $events = [
            [
                'title' => 'Event 1',
                'description' => 'Description for Event 1',
                'date' => now()->addWeeks(2)->toDateString(),
                'time' => '14:00:00',
                'location' => 'Location 1',
                'category' => 'sport',
                'price' => '100',
            ],
            [
                'title' => 'Event 2',
                'description' => 'Description for Event 2',
                'date' => now()->addWeeks(2)->addDay()->toDateString(),
                'time' => '15:30:00',
                'location' => 'Location 2',
                'category' => 'festival',
                'price' => '100',
            ],
            [
                'title' => 'Event 3',
                'description' => 'Description for Event 3',
                'date' => now()->addWeeks(2)->addDays(2)->toDateString(),
                'time' => '16:45:00',
                'location' => 'Location 3',
                'category' => 'films',
                'price' => '100',
            ],
            [
                'title' => 'Event 4',
                'description' => 'Description for Event 4',
                'date' => now()->addWeeks(2)->addDays(3)->toDateString(),
                'time' => '18:00:00',
                'location' => 'Location 4',
                'category' => 'sport',
                'price' => '100',
            ],
            [
                'title' => 'Event 5',
                'description' => 'Description for Event 5',
                'date' => now()->addWeeks(2)->addDays(4)->toDateString(),
                'time' => '19:15:00',
                'location' => 'Location 5',
                'category' => 'festival',
                'price' => '100',
            ],
            [
                'title' => 'Event 6',
                'description' => 'Description for Event 6',
                'date' => now()->addWeeks(2)->addDays(5)->toDateString(),
                'time' => '20:30:00',
                'location' => 'Location 6',
                'category' => 'films',
                'price' => '100',
            ],
            [
                'title' => 'Event 7',
                'description' => 'Description for Event 7',
                'date' => now()->addWeeks(2)->addDays(6)->toDateString(),
                'time' => '21:45:00',
                'location' => 'Location 7',
                'category' => 'sport',
                'price' => '100',
            ],
            [
                'title' => 'Event 8',
                'description' => 'Description for Event 8',
                'date' => now()->addWeeks(2)->addDays(7)->toDateString(),
                'time' => '22:00:00',
                'location' => 'Location 8',
                'category' => 'festival',
                'price' => '100',
            ],
            [
                'title' => 'Event 9',
                'description' => 'Description for Event 9',
                'date' => now()->addWeeks(2)->addDays(8)->toDateString(),
                'time' => '23:15:00',
                'location' => 'Location 9',
                'category' => 'films',
                'price' => '100',
            ],
            [
                'title' => 'Event 10',
                'description' => 'Description for Event 10',
                'date' => now()->addWeeks(2)->addDays(9)->toDateString(),
                'time' => '23:30:00',
                'location' => 'Location 10',
                'category' => 'sport',
                'price' => '100',
            ],
        ];

        foreach ($events as $event) {
            Event::create([
                'title' => $event['title'],
                'description' => $event['description'],
                'date' => $event['date'],
                'time' => $event['time'],
                'location' => $event['location'],
                'category' => $event['category'],
                'price' => $event['price'],
            ]);
        }
    }
}
