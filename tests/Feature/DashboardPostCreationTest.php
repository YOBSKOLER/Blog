<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardPostCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_creates_post_with_existing_category_and_tag_relations(): void
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'Technology', 'slug' => 'technology']);
        $tag = Tag::create(['name' => 'Laravel', 'slug' => 'laravel']);

        $response = $this->actingAs($user)->post(route('dashboard.store.post'), [
            'title' => 'A relational post',
            'slug' => 'a-relational-post',
            'content' => 'Content',
            'category_ids' => [$category->id],
            'tag_ids' => [$tag->id],
        ]);

        $response->assertRedirect(route('dashboard.posts'));
        $postId = Post::query()->where('slug', 'a-relational-post')->value('id');
        $this->assertDatabaseHas('post', [
            'slug' => 'a-relational-post',
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('category_post', [
            'post_id' => $postId,
            'category_id' => $category->id,
        ]);
        $this->assertDatabaseHas('post_tag', [
            'post_id' => $postId,
            'tag_id' => $tag->id,
        ]);
    }

    public function test_guest_cannot_open_post_creation_form(): void
    {
        $this->get(route('dashboard.create.post'))
            ->assertRedirect(route('login'));
    }
}
