<x-form-input name="title" label="Title" type="text" />
<x-form-textarea name="content" label="Content" type="text" />
{{-- @php
    dd($cats);
@endphp --}}
<x-form-select name="category_id" placeholder="Choose..." :options="$cats" label="Category">
    <option value="1">Belgium</option>
</x-form-select>