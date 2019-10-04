<?php

use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = factory(App\User::class, 1)
            ->create([
                'id' => 1,
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => bcrypt('12345'),
            ]);

        $post1 = factory(App\Post::class, 1)
            ->create([
                'id'      => 1,
                'user_id' => 1,
            ]);

        $post2 = factory(App\Post::class, 1)
            ->create([
                'id'      => 2,
                'user_id' => 1,
            ]);
        $reply1 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 1,
                'post_id' => 1,
            ]);
        $reply2 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 1,
                'post_id' => 1,
            ]);
        $reply3 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 1,
                'post_id' => 2,
            ]);
        $reply4 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 1,
                'post_id' => 2,
            ]);
        $user2 = factory(App\User::class, 1)
            ->create([
                'id' => 2,
            ]);

        $post1 = factory(App\Post::class, 1)
            ->create([
                'id'      => 3,
                'user_id' => 2,
            ]);

        $post2 = factory(App\Post::class, 1)
            ->create([
                'id'      => 4,
                'user_id' => 2,
            ]);
        $reply1 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 2,
                'post_id' => 3,
            ]);
        $reply2 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 2,
                'post_id' => 3,
            ]);
        $reply3 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 2,
                'post_id' => 4,
            ]);
        $reply4 = factory(App\Reply::class, 1)
            ->create([
                'user_id' => 2,
                'post_id' => 4,
            ]);
    }
}
