<?php
return [
    'name' => 'ync',
    'title' => 'My Blog',
    'subtitle' => '735624429@qq.com',
    'description' => 'blog of ync',
    'author' => 'ync',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 10,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],
    'contact_email' => env('MAIL_FROM'),
];