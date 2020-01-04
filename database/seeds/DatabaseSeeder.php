<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-03 20:50:14
 * @LastEditors: LMG
 * @LastEditTime: 2020-01-03 23:03:06
 */

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
        $this->call(UsersTableSeeder::class);
    }
}