<h1>EDIT</h1>
<form method="post" action="/posts/{{ $id }}">
    @csrf
    <input type="text" name="title" value="{{ $post->title }}">
    <br>
    <input type="text" name="content"  value="{{ $post->content }}">
    <br>
    <button type="submit">Send</button>
</form>