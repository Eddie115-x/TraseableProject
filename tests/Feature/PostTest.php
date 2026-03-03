<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Traseable');
    }

    #[Test]
    public function posts_index_page_loads(): void
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('Posts');
    }

    #[Test]
    public function posts_index_displays_posts(): void
    {
        Post::create([
            'title' => 'Test Post Title',
            'content' => 'Test post content here.',
        ]);

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('Test Post Title');
    }

    #[Test]
    public function can_view_single_post(): void
    {
        $post = Post::create([
            'title' => 'Single Post',
            'content' => 'Single post content.',
        ]);

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
        $response->assertSee('Single Post');
        $response->assertSee('Single post content.');
    }

    #[Test]
    public function create_post_page_loads(): void
    {
        $response = $this->get('/posts/create');

        $response->assertStatus(200);
        $response->assertSee('Create');
    }

    #[Test]
    public function can_create_post(): void
    {
        $response = $this->post('/posts', [
            'title' => 'New Post',
            'content' => 'New post content.',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'title' => 'New Post',
            'content' => 'New post content.',
        ]);
    }

    #[Test]
    public function create_post_requires_title(): void
    {
        $response = $this->post('/posts', [
            'title' => '',
            'content' => 'Content without title.',
        ]);

        $response->assertSessionHasErrors('title');
    }

    #[Test]
    public function create_post_requires_content(): void
    {
        $response = $this->post('/posts', [
            'title' => 'Title without content',
            'content' => '',
        ]);

        $response->assertSessionHasErrors('content');
    }

    #[Test]
    public function edit_post_page_loads(): void
    {
        $post = Post::create([
            'title' => 'Edit Me',
            'content' => 'Edit this content.',
        ]);

        $response = $this->get("/posts/{$post->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Edit');
        $response->assertSee('Edit Me');
    }

    #[Test]
    public function can_update_post(): void
    {
        $post = Post::create([
            'title' => 'Original Title',
            'content' => 'Original content.',
        ]);

        $response = $this->put("/posts/{$post->id}", [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);
    }

    #[Test]
    public function can_delete_post(): void
    {
        $post = Post::create([
            'title' => 'Delete Me',
            'content' => 'This will be deleted.',
        ]);

        $response = $this->delete("/posts/{$post->id}");

        $response->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
