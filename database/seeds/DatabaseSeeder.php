<?php

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
        factory(App\Admin::class)->create();

        foreach (explode('|', env('SEEDER_FORME_JURIDIQUES')) as $forme)
            DB::table('forme_juridiques')
                ->insert([
                    'nom' => $forme,
                    'created_at'=>now(),
                    'updated_at'=>now()
                    ]);

        factory(App\Adherent::class,15)->create();
        factory(App\Partenaire::class,15)->create();
    }
}
