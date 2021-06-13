<?php

namespace Tests\Feature;

use App\Models\Idea;
use App\Models\Category;
use App\Models\Status;
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
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);
        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaOne->category->name);
        $response->assertSee('Open</div>', false);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($ideaOne->category->name);
        $response->assertSee('Considering</div>', false);
    }

    /**
     * @test
     * 
     */
    public function single_idea_shows_correctly_in_show_idea_page()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $idea = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

        $response = $this->get(route('idea.show', ['idea' => $idea]));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($idea->category->name);
        $response->assertSee('Open</div>', false);
    }

    /**
     * @test
     */

     public function ideas_pagination_works()
     {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        Idea::factory(Idea::PAGINATION_COUNT +1)->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

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
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'Description For My First Idea',
        ]);
        $ideaTwo = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
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
