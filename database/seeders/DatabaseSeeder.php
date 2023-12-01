<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MoonshineUser::query()->create([
            'name' => 'Admin',
            'moonshine_user_role_id' => MoonshineUserRole::DEFAULT_ROLE_ID,
            'email' => 'admin@moonshine-laravel.com',
            'password' => bcrypt('moonshine')
        ]);

        MoonshineUserRole::query()->create([
            'id' => 2,
            'name' => 'Author'
        ]);

        Article::factory(20)->create();
        Category::factory(10)->create();
        User::factory(10)->create();
    }
}
