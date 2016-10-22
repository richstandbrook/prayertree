<?php

use Illuminate\Database\Seeder;

class PrayerRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $contacts = \App\Contact::all()->toArray();
        $prayerTrees = \App\PrayerTree::all()->toArray();

        foreach (range(0, 100) as $i) {

            $contact = $faker->randomElement($contacts);
            $prayerTree = $faker->randomElement($prayerTrees);

            factory(\App\PrayerRequest::class)->create([
                'contact_id' => $contact['id'],
                'prayer_tree_id' => $prayerTree['id']
            ]);
        }
    }
}
