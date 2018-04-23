<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Hash;
use App\Models\Video;

class VideoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        echo "\nvideo test\n";
        $user = User::updateOrCreate(['email'=>'test_user@gmail.com'], ['name'=>'Jet', 'password'=>Hash::make('secret')]);
        $video = new Video(['user_id'=>$user->id, 'bitrate'=>128, 'filesize'=>256, 'duration'=>120, 'extension'=>'.mp4', 'format'=>'mp4']);
        $this->assertTrue($video->bitrate == 128);
        $this->assertFalse($video->filesize == 42);
        $video->save();
    }
}
