<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/');
        $response->assertStatus(302);

        $response = $this->get('admin');
        $response->assertStatus(302);

        $response = $this->get('admin/post');
        $response->assertStatus(200);

        $response = $this->get('admin/post/create');
        $response->assertStatus(200);

        $response = $this->get('admin/post/{post}/edit');
        $response->assertStatus(200);

        $response = $this->get('admin/tag');
        $response->assertStatus(200);

        $response = $this->get('admin/tag/create');
        $response->assertStatus(200);

        $response = $this->get('admin/tag/{tag}/edit');
        $response->assertStatus(200);

        $response = $this->get('admin/upload');
        $response->assertStatus(200);

        $response = $this->get('api/user');
        $response->assertStatus(200);

        $response = $this->get('blog');
        $response->assertStatus(200);

        $response = $this->get('blog/{slug}');
        $response->assertStatus(200);

        $response = $this->get('contact');
        $response->assertStatus(200);

        $response = $this->get('login');
        $response->assertStatus(200);

        $response = $this->get('logout');
        $response->assertStatus(200);

        $response = $this->get('rss');
        $response->assertStatus(200);

        $response = $this->get('sitemap.xml');
        $response->assertStatus(200);
    }
}
