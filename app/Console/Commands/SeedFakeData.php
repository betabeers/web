<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedFakeData extends Command
{
    protected $signature = 'betabeers:seedfakedata';
    protected $description = 'Seed fake data';
    protected $tags = [
        'backend', 'frontend', 'php', 'rails', 'django', 'python', 'ux', 'ios', 'android', 'laravel', 'symfony', 'java'
    ];

    const USERS = 99;
    const USERFOLLOW = 200;
    const JOBS = 100;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:refresh');
        $this->call('db:seed');

        factory(\App\Models\User::class)->create([
            'name' => 'Admin',
            'password' => 'admin',
            'email' => 'admin@betabeers.com',
            'slug' => 'admin',
            'admin' => 1,
            'moderator' => 1
        ]);

        factory(\App\Models\User::class, self::USERS)->create();

        for ($i = 0; $i < self::USERFOLLOW; $i++) {
            \App\Models\User::find(mt_rand(1, 100))->followings()->create([
                'to_id' => mt_rand(1, 100)
            ]);
        }

        for ($i = 1; $i <= self::USERS; $i++) {
            for ($itag = 0; $itag < mt_rand(1, 3); $itag++) {
                \App\Models\User::find($i)->tags()->create([
                    'tag' => $this->tags[array_rand($this->tags)]
                ]);
            }

            if (mt_rand(1, 4) === 4) {
                factory(\App\Models\Job::class, mt_rand(1, 3))->create([
                    'user_id' => mt_rand(1, self::USERS)
                ]);
            }
        }

        for ($i = 1; $i <= \App\Models\Job::count(); $i++) {
            for ($itag = 0; $itag < mt_rand(1, 3); $itag++) {
                \App\Models\Job::find($i)->tags()->create([
                    'tag' => $this->tags[array_rand($this->tags)]
                ]);
            }
        }
    }
}
