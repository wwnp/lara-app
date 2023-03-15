<div class="row">
    <div class="col-md-6">
        <x-form-input name="title" label="Title" type="text" />
        <x-form-select name="category_id" placeholder="Выберите категорию" :options="$cats" label="Категория"></x-form-select>
        
    </div>
    <div class="col-md-6">
        <x-form-select name="tags[]" label="Теги" :options="$tags" multiple many-relation></x-form-select>
        {{-- <x-form-input name="birth_year" label="Birth year" type="number" default="1990"/> --}}
    </div>

    {{-- <div class="col-md-12">
        <x-form-select name="tags[]" style="display: none" multiple id="my_select"></x-form-select>
        <div class="form-group mt-2">
            <div class="btn-group" role="group" aria-label="Selected Button Group" id="js_btnsTag">
                @foreach ($tags as $id => $title)
                        <button type="button" class="btn btn-dark btn-sm" data-id="{{ $id }}">{{ $title }}</button>
                @endforeach
                </div>
        </div>
    </div> --}}


    <div class="col-md-12">
        <div class="py-2">
            <button class="btn btn-info btn-sm" id="btn-h1">H1</button>
            <button class="btn btn-info btn-sm" id="btn-p">P</button>
            <button class="btn btn-warning btn-sm" id="btn-code">Code</button>
        </div>
        <x-form-textarea name="content" label="Content" type="text" v-html="formData.content" rows="36" id="createTextarea" />
    </div>
</div>


{{-- <x-form-select name="tags[]" style="display: none" multiple id="my_select"></x-form-select> --}}
{{-- <div class="form-group mt-2">
    <div class="btn-group" role="group" aria-label="Selected Button Group" id="js_btnsTag">
        @foreach ($tags as $id => $title)
                <button type="button" class="btn btn-dark btn-sm" data-id="{{ $id }}">{{ $title }}</button>
        @endforeach
        </div>
</div> --}}

{{-- <script>
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
</script> --}}
