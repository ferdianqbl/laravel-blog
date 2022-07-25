<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Ferdian Iqbal',
            'username' => 'ferdianqbl',
            'email' => 'ferdian@gmail.com',
            'password' => bcrypt('Ferdian12'),
        ]);
        User::factory(19)->create();
        Blog::factory(1000)->create();
        Category::factory(6)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        // =============================================================
        // User::create([
        //     'name' => 'john',
        //     'email' => 'john@gmail.com',
        //     'password' => bcrypt('1234'),
        // ]);
        // User::create([
        //     'name' => 'Alex',
        //     'email' => 'alex@gmail.com',
        //     'password' => bcrypt('1234'),
        // ]);

        // Category::create([
        //     'category_name' => 'Programming',
        //     'category_slug' => 'programming',
        // ]);
        // Category::create([
        //     'category_name' => 'Personal',
        //     'category_slug' => 'personal',
        // ]);

        // Blog::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Test Blog',
        //     'slug' => 'test-blog',
        //     'excerpt' => 'This is a test blog excerpt.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab at, pariatur sapiente obcaecati id, minus quam facilis, officia quos autem illo. Non similique necessitatibus pariatur cupiditate reprehenderit! Alias ex, quisquam in odit fugit iusto facere quos expedita dolore minus voluptatum distinctio quibusdam et perspiciatis doloremque explicabo suscipit perferendis eaque. Corrupti, debitis ut itaque fuga, dolorem ex veniam minima reprehenderit laboriosam qui optio fugit cupiditate nulla vero minus voluptatibus numquam laudantium nisi rem porro recusandae dolor ullam vitae aspernatur. Consectetur adipisci possimus, eligendi sapiente blanditiis officia accusantium officiis! Dolor nostrum officiis sed, cum placeat ex suscipit quas totam debitis, illum officia!',
        // ]);

        // Blog::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'title' => 'Test Blog 2',
        //     'slug' => 'test-blog-2',
        //     'excerpt' => 'This is a test blog excerpt.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab at, pariatur sapiente obcaecati id, minus quam facilis, officia quos autem illo. Non similique necessitatibus pariatur cupiditate reprehenderit! Alias ex, quisquam in odit fugit iusto facere quos expedita dolore minus voluptatum distinctio quibusdam et perspiciatis doloremque explicabo suscipit perferendis eaque. Corrupti, debitis ut itaque fuga, dolorem ex veniam minima reprehenderit laboriosam qui optio fugit cupiditate nulla vero minus voluptatibus numquam laudantium nisi rem porro recusandae dolor ullam vitae aspernatur. Consectetur adipisci possimus, eligendi sapiente blanditiis officia accusantium officiis! Dolor nostrum officiis sed, cum placeat ex suscipit quas totam debitis, illum officia!',
        // ]);

        // Blog::create([
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'title' => 'Test Blog 3',
        //     'slug' => 'test-blog-3',
        //     'excerpt' => 'This is a test blog excerpt.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab at, pariatur sapiente obcaecati id, minus quam facilis, officia quos autem illo. Non similique necessitatibus pariatur cupiditate reprehenderit! Alias ex, quisquam in odit fugit iusto facere quos expedita dolore minus voluptatum distinctio quibusdam et perspiciatis doloremque explicabo suscipit perferendis eaque. Corrupti, debitis ut itaque fuga, dolorem ex veniam minima reprehenderit laboriosam qui optio fugit cupiditate nulla vero minus voluptatibus numquam laudantium nisi rem porro recusandae dolor ullam vitae aspernatur. Consectetur adipisci possimus, eligendi sapiente blanditiis officia accusantium officiis! Dolor nostrum officiis sed, cum placeat ex suscipit quas totam debitis, illum officia!',
        // ]);
        // Blog::create([
        //     'category_id' => 2,
        //     'user_id' => 2,
        //     'title' => 'Test Blog 4',
        //     'slug' => 'test-blog-4',
        //     'excerpt' => 'This is a test blog excerpt.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab at, pariatur sapiente obcaecati id, minus quam facilis, officia quos autem illo. Non similique necessitatibus pariatur cupiditate reprehenderit! Alias ex, quisquam in odit fugit iusto facere quos expedita dolore minus voluptatum distinctio quibusdam et perspiciatis doloremque explicabo suscipit perferendis eaque. Corrupti, debitis ut itaque fuga, dolorem ex veniam minima reprehenderit laboriosam qui optio fugit cupiditate nulla vero minus voluptatibus numquam laudantium nisi rem porro recusandae dolor ullam vitae aspernatur. Consectetur adipisci possimus, eligendi sapiente blanditiis officia accusantium officiis! Dolor nostrum officiis sed, cum placeat ex suscipit quas totam debitis, illum officia!',
        // ]);

    }
}
