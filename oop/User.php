<?php

require_once('Post.php');

/**
 * Сущность пользователя
 * Аттрибуты: $name(имя пользователя), $posts(список постов пользователя)
 * 
 */

class User{

    /**
     * @var string $name - имя
     * @access private
     *
     * @var array $posts - посты пользователя
     * @access private
     */
    private string $name;
    private array $posts = array();

    function __construct($name){
        $this->name = $name;   
    }

    /**
     * геттеры для аттрибутов $name и $posts
     */
    public function getName(): string{
        return $this->name;
    }

    public function getPosts(): array{
        return $this->posts;
    }

    /**
     * @method createPost() - создание поста с добавлением его в массив постов инстанса данного класса,
     *  а так же установление автора у поста, передаваемого в параметрах
     */

    public function createPost(Post $post){
        $this->posts[] = $post;
        $post->setUser($this);
        echo 'You\'re successfully added this post<br>';
    }
}