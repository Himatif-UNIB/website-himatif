<?php

namespace App\View\Components\Site\Blog;

use Illuminate\View\Component;

class CommentForm extends Component
{
    /**
     * Data posting
     * 
     * @var object
     */
    public $post;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.site.blog.comment-form');
    }
}
