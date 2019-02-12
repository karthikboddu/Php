<?php

// Post Class can look like this
Class Post
{
    /**
     * @var string $title
     */
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->title;
    } 
}

?>