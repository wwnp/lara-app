<h1>EDIT</h1>
@include('posts.form', [ 
    'title' => $post->title,
    'content' => $post->content 
    ]
)