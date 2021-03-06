<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"></x-form.input>
            <x-form.input name="slug" :value="old('slug', $post->slug)"></x-form.input>
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file"
                                  :value="old('thubnail', $post->thumbnail)"></x-form.input>
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail)  }}" alt="" class="rounded-xl" width="50">
            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category"/>
                <select name="category_id" id="category_id" class="appearance-none form-select">
                    @foreach(\App\Models\Category::all() as $cat)

                        <option
                            value="{{ $cat->id }}" {{ old('category_id'), $post->category_id == $cat->id ? 'selected': '' }}>{{ ucwords($cat->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>

            </x-form.field>

            <x-form.button>UPDATE</x-form.button>
        </form>
    </x-setting>

</x-layout>
