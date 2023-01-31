<h1>FORM</h1>
<form method="post" action="/posts">
    @csrf
    <input type="text" name="title" value="{{ $title }}">
    <br>
    <input type="text" name="content"  value="{{ $content }}">
    <br>
    <button type="submit">Send</button>
</form>