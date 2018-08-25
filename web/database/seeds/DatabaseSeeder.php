<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->truncate(['users', 'roles', 'articles', 'profiles']);

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);

    }

    public function truncate(array $tables)
    {
        foreach ($tables as $table) {

            Db::table($table)->truncate();

        }
    }
}
