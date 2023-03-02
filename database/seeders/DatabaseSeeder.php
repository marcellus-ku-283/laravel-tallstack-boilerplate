<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TicketCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('master_settings')->insert([
            [
                'key' => 'contact_number',
                'label' => 'Contact Number',
                'type' => 'text',
                'value' => '8128100125',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'contact_number_swahili',
                'label' => 'Contact Number Swahili',
                'type' => 'text',
                'value' => '8128100125',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'email_address',
                'label' => 'Email Address',
                'type' => 'text',
                'value' => 'admin@example.com',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'website',
                'label' => 'Website',
                'type' => 'text',
                'value' => 'https://momentumcredit.co.ke',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'facebook_link',
                'label' => 'Facebook Link',
                'type' => 'text',
                'value' => 'https://facebook.com',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'instagram_link',
                'label' => 'Instagram Link',
                'type' => 'text',
                'value' => 'https://instagram.com',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'twitter_link',
                'label' => 'Twitter Link',
                'type' => 'text',
                'value' => 'https://twitter.com',
                'display_type' => 'contact_screen' 
            ],
            [
                'key' => 'help_email',
                'label' => 'Help Email',
                'type' => 'text',
                'value' => 'support@momentum.com',
                'display_type' => 'contact_screen' 
            ]
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\Ticket::factory(75)->create();
        TicketCategory::factory(100)->create();
        \App\Models\SecurityQuestion::factory(10)->create();
    }
}
