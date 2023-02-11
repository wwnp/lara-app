<x-form-input name="title" label="Title" type="text" />
<x-form-textarea name="content" label="Content" type="text" />
{{-- <x-form-select name="category_id" :options="$cats" placeholder="Select"/> --}}
<x-select name="category_id" :options="$cats"></x-select>