<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SqliteTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        // 填充数据库
        $this->seed(UsersTableSeeder::class);

        $list = User::all();
        dd($list);

        $this->assertTrue(true);
    }
}
