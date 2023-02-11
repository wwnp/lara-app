@csrf
<x-controls.input name="slug" label="Slug" type="text" :defaultValue="$category?->slug ?? ''  " />
<x-controls.input name="title" label="Title" type="text"  :defaultValue="$category?->title ?? ''  " />
<x-controls.input name="desc" label="Desc" type="text"  :defaultValue="$category?->desc ?? ''  " />
<button class="mt-3 btn btn-info">Send</button>