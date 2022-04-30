@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" width="60"
                     class="rounded-xl"
                     alt=""/>

                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                                    <textarea name="body"
                                              class="w-full text-sm focus:outline-none focus:ring p-6"
                                              cols="30" rows="5"
                                              placeholder="Quick, thing something to say!" required></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end border-t border-gray-200 pt-6 mt-6">
                <x-submit-button>POST</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold"><a href="/register" class="hover:underline">Register</a> or <a
            href="/login" class="hover:underline">Log in</a> to leave a
        comment</p>
@endauth
