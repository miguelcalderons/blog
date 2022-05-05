<x-layout>
    <x-setting heading="Publish new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.input name="thumbnail" type="file"></x-form.input>
            <x-form.textarea name="excerpt"></x-form.textarea>
            <x-form.textarea name="body"></x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="appearance-none form-select">
                    @foreach(\App\Models\Category::all() as $cat)

                        <option
                            value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected': '' }}>{{ ucwords($cat->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>

            </x-form.field>

            <x-form.button>PUBLISH</x-form.button>
        </form>
    </x-setting>

</x-layout>
