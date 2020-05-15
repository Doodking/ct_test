<?php

require_once('oop/User.php');
require_once('oop/Post.php');

$user1 = new User('Misha');
$user2 = new User('Ivan');

$post = new Post('Hello', 'World');

$user1->createPost($post);

print_r($user1->getPosts());

$post->setUser($user2);

//print_r($post->getUser());