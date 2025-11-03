<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'title' => 'Hadiah Romantis Pertama 💝',
            'message' => 'Kamu adalah bintang di setiap malamku ✨',
            'image' => 'public/sample.jpg',
            'video' => 'public/sample.mp4',
            'music' => 'public/c:\Users\User\Downloads\WhatsApp Video 2025-10-21 at 19.51.09.mp4'
        ]);
    }
}
