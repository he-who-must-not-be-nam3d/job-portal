<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Nairobi',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, provident. Blanditiis corrupti eos ducimus eius quidem, expedita sint ex earum debitis amet asperiores accusantium. Maxime harum repudiandae fugiat id nulla!',
        // ]);
        // Listing::create([
        //     'title' => 'Full stack Developer',
        //     'tags' => 'laravel,backend, javascript',
        //     'company' => 'Wayne Enterprise',
        //     'location' => 'Nakuru',
        //     'email' => 'wayne@email.com',
        //     'website' => 'https://www.wayne.com',
        //     'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, provident. Blanditiis corrupti eos ducimus eius quidem, expedita sint ex earum debitis amet asperiores accusantium. Maxime harum repudiandae fugiat id nulla!',
        // ]);
    }
}
