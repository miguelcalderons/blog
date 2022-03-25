@props(['posts'])
<div class="grid grid-cols-6">
    @foreach ($posts->skip(1) as $post)
        <x-post-card
            :post="$post"
            style="{{ $loop->iteration < 3 ? 'grid-column: span 3' : 'grid-column: span 2' }}"
        />
    @endforeach
</div>
