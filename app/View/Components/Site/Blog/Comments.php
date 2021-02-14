<?php

namespace App\View\Components\Site\Blog;

use Illuminate\View\Component;

class Comments extends Component
{
    public $comments;
    public $post;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments, $post)
    {
        $this->comments = $comments;
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.site.blog.comments');
    }
}
