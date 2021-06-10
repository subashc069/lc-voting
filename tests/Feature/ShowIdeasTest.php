<?php

namespace Tests\Feature;

use App\Models\Idea;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{   
    use RefreshDatabase;
    /**
     * @test
     * A basic feature test example.
     *
     * @return void
     */
    public function list_of_ideas_shows_in_main_page()
    {
        $ideaOne = Idea::factory()->create();
        $ideaTwo = Idea::factory()->create();

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }

    /**
     * @test
     * 
     */
    public function single_idea_shows_correctly_in_show_idea_page()
    {
        $idea = Idea::factory()->create();

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
    }

    /**
     * @test
     */

     public function ideas_pagination_works()
     {
        Idea::factory(Idea::PAGINATION_COUNT +1)->create();

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();
        
        $response = $this->get('/');
        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');
        $response->assertSuccessful();

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }

    /**
     * @test
     */
    public function same_idea_titles_different_slugs()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Description For My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
            'description' => 'Another Description For My First Idea',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');
        
        $response = $this->get(route('idea.show', $ideaTwo));
        $response->assertSuccessful();

        $this->assertTrue(request()->path() === 'ideas/my-first-idea-2');
    }
}
