<?php

use App\Contact;
use App\User;
use Illuminate\Database\Seeder;

class PrayerTreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $contacts = Contact::all();

        $users->each(function ($user) use ($contacts) {
            $prayerTree = factory(\App\PrayerTree::class)->create([
                'user_id' => $user->id
            ]);

            $prayerTree->subscribers()->attach(
                $contacts->random(20)
            );
        });
    }
}
