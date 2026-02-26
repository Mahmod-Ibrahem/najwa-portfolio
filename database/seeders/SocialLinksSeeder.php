<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePage;

class SocialLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = HomePage::singleton();

        $socialLinks = [
            ['platform' => 'youtube', 'url' => 'https://www.youtube.com/@ange22228'],
            ['platform' => 'snapchat', 'url' => 'https://www.snapchat.com/add/ange222281'],
            ['platform' => 'tiktok', 'url' => 'https://www.tiktok.com/@ange222281'],
            ['platform' => 'telegram', 'url' => 'https://t.me/+-einTREA7M9hNGU0'],
            ['platform' => 'x', 'url' => 'https://x.com/ange22228'],
            ['platform' => 'salla', 'url' => 'https://salla.sa/aoun-educational'],
        ];

        $page->update([
            'social_links' => $socialLinks
        ]);
    }
}
