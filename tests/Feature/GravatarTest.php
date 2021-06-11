<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class GravatarTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * @test
     * A basic unit test example.
     *
     * @return void
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'andre',
            'email' => 'afakeemail@laracasts.com'
        ]);


        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png',
            $gravatarUrl
        );
        
        $response = Http::get($gravatarUrl);

        $this->assertTrue($response->successful());

    }
    
    /**
     * @test
     * A basic unit test example.
     *
     * @return void
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_last_character_z()
    {
        $user = User::factory()->create([
            'name' => 'andre',
            'email' => 'zfakeemail@laracasts.com'
        ]);


        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png',
            $gravatarUrl
        );
        
        $response = Http::get($gravatarUrl);

        $this->assertTrue($response->successful());

    }

    /**
     * @test
     * A basic unit test example.
     *
     * @return void
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_number_0()
    {
        $user = User::factory()->create([
            'name' => 'andre',
            'email' => '0fakeemail@laracasts.com'
        ]);


        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png',
            $gravatarUrl
        );
        
        $response = Http::get($gravatarUrl);

        $this->assertTrue($response->successful());

    }

    /**
     * @test
     * A basic unit test example.
     *
     * @return void
     */
    public function user_can_generate_gravatar_default_image_when_no_email_found_last_number_9()
    {
        $user = User::factory()->create([
            'name' => 'andre',
            'email' => '9fakeemail@laracasts.com'
        ]);


        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png',
            $gravatarUrl
        );
        
        $response = Http::get($gravatarUrl);

        $this->assertTrue($response->successful());

    }

}
