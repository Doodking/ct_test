<?php

require_once('User.php');

/**
 * Сущность поста
 * Аттрибуты: $title(заголовок), $text(текст поста), $user(автор поста)
 * 
 */

class Post{

    /**
     * @var string $title - заголовок
     * @access private
     *
     * @var string $text - текст
     * @access private
     * 
     * @var User $user - автор
     * @access private
     */
    
    private string $title;
    private string $text;
    private User $user;

    function __construct(string $title, string $text){
        $this->title = $title;
        $this->text = $text;    
    }

    /**
     * геттеры для аттрибутов класса
     */

    public function getTitle(): string {
        return $this->title;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getUser(): User{
        return $this->user;
    }

    /**
     * сеттер, использующийся в классе User
     */

    public function setUser(User $user){
        $this->user = $user;
    }

}