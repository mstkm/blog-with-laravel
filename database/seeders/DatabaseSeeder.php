<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
          'isAdmin' => true,
          'name' => 'Mugi Mustakim',
          'username' => 'mugimustakim',
          'email' => 'mustakimmugi@gmail.com',
          'password' => bcrypt('123')
        ]);
        // User::create([
        //   'name' => 'Mustakim',
        //   'email' => 'mustakim@gmail.com',
        //   'password' => bcrypt('123')
        // ]);

        Category::create([
          'name' => 'Programming',
          'slug' => 'programming'
        ]);
        Category::create([
          'name' => 'Web Design',
          'slug' => 'web-design'
        ]);
        Category::create([
          'name' => 'Computer Science',
          'slug' => 'computer-science'
        ]);

        Post::factory(25)->create();

        // Post::create([
        //   'category_id' => 1,
        //   'user_id' => 1,
        //   'title' => 'Judul Pertama',
        //   'slug' => 'judul-pertama',
        //   'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper...',
        //   'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Elementum curabitur vitae nunc sed velit dignissim sodales ut. Dui id ornare arcu odio ut sem nulla. Amet tellus cras adipiscing enim eu turpis egestas pretium. Euismod in pellentesque massa placerat duis ultricies lacus sed turpis. Venenatis a condimentum vitae sapien pellentesque habitant. Commodo elit at imperdiet dui. Morbi blandit cursus risus at ultrices. Id consectetur purus ut faucibus pulvinar elementum. Porta lorem mollis aliquam ut porttitor leo.'
        // ]);
        // Post::create([
        //   'category_id' => 1,
        //   'user_id' => 1,
        //   'title' => 'Judul Kedua',
        //   'slug' => 'judul-kedua',
        //   'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper...',
        //   'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Elementum curabitur vitae nunc sed velit dignissim sodales ut. Dui id ornare arcu odio ut sem nulla. Amet tellus cras adipiscing enim eu turpis egestas pretium. Euismod in pellentesque massa placerat duis ultricies lacus sed turpis. Venenatis a condimentum vitae sapien pellentesque habitant. Commodo elit at imperdiet dui. Morbi blandit cursus risus at ultrices. Id consectetur purus ut faucibus pulvinar elementum. Porta lorem mollis aliquam ut porttitor leo.'
        // ]);
        // Post::create([
        //   'category_id' => 2,
        //   'user_id' => 2,
        //   'title' => 'Judul Ketiga',
        //   'slug' => 'judul-ketiga',
        //   'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper...',
        //   'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Elementum curabitur vitae nunc sed velit dignissim sodales ut. Dui id ornare arcu odio ut sem nulla. Amet tellus cras adipiscing enim eu turpis egestas pretium. Euismod in pellentesque massa placerat duis ultricies lacus sed turpis. Venenatis a condimentum vitae sapien pellentesque habitant. Commodo elit at imperdiet dui. Morbi blandit cursus risus at ultrices. Id consectetur purus ut faucibus pulvinar elementum. Porta lorem mollis aliquam ut porttitor leo.'
        // ]);
    }
}
