<x-form-input name="title" label="Title" type="text" />
<x-form-textarea name="content" label="Content" type="text" />
<x-form-select name="category_id" placeholder="Choose..." :options="$cats" label="Category"></x-form-select>
<x-form-select name="tags[]" style="display: none" multiple id="my_select"></x-form-select>
{{-- <x-form-select name="tags[]" label="Теги" :options="$tags" multiple many-relation></x-form-select> --}}
<x-form-input name="birth_year" label="Birth year" type="number" default="1990"/>



{{-- <select name="tags[]" id="my_select" style="display: none" multiple>
</select>
@error('tags')
    <h5>{{ $message }}</h5>
@enderror --}}

<div class="form-group mt-2">
    <div class="btn-group" role="group" aria-label="Selected Button Group" id="js_btnsTag">
        @foreach ($tags as $id => $title)
                <button type="button" class="btn btn-dark btn-sm" data-id="{{ $id }}">{{ $title }}</button>
        @endforeach
        </div>
</div>

<script>    
    let sTags = []
    const selectEl = document.getElementById('my_select');
    const btnGroup = document.querySelector('#js_btnsTag')
    btnGroup.addEventListener('click', function(el){
        
        if(!el.target.classList.contains('active')){
            el.target.classList.add('active')     
            sTags.push({ "id" : el.target.dataset.id, "value" : el.target.textContent.trim() })
        }else {
            el.target.classList.remove('active')   
            sTags = sTags.filter(function(item) {
                return item.id !== el.target.dataset.id
            })
          
        }
        selectEl.innerHTML = ""
        sTags.forEach((tag) => {
            const newOption = document.createElement('option');
            newOption.value = tag.id;
            newOption.text = tag.value;
            newOption.selected = true;
            selectEl.appendChild(newOption);
        });
    })
</script>