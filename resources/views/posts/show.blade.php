<x-layout> <!-- See $slot at resources\views\components\layout.blade.php -->

    <article>

        {{-- The title --}}
        <h1 class="font-bold text-3xl mb-4" style="color: #333"> {!! $post->title !!} </h1>

        {{-- The image associated with the post --}}
        <img src="{{ asset('storage/') . '/' . $post->thumbnail }}" alt="Example Image" width="500" height="300" title="This is an example image">

        {{-- We write "asset('storage/') . '/' . $post->thumbnail" since we are working on the public disk
        and here it says that "url" => "env('APP_URL').'/storage'" and this is what is given when
        we write asset('storage/') . '/'. We were told (by ChatGPT) to create a storage link first
        using "php artisan storage:link" --}}




        <div class="font-bold mb-4 text-xl">
            {{-- The excerpt of the given post --}}
            {!!  $post->excerpt !!}
        </div>

        <div class="mb-4 text-xl">
            <!-- The body from the given post -->
            {!!  $post->body !!}

        </div>

    </article>

<a style="color: #007BFF" href="/">Go back</a>
</x-layout>
