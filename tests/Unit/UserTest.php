<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Hash;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        echo "\nuser test\n";
        $user = User::updateOrCreate(['email'=>'test_user@gmail.com'], ['name'=>'Test', 'password'=>Hash::make('secret')]);
        $this->assertTrue($user->name=='Jet');
    }
}
