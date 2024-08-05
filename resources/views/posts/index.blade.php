<x-layout>
{{-- On this page the admin can see all posts in a table
    and then edit or delete them. The admin can also see
    the posts themselves by clicking on a title.  --}}


<div class="container mx-auto">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">

                {{-- The table head  --}}
                <thead>
                    <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">

                        {{-- The first column holds the titles of the post --}}
                        <th class="py-3 px-6 text-left">Title of Post</th>

                        {{-- The second column holds the posts' slugs --}}
                        <th class="py-3 px-6 text-left">Slug</th>

                        {{-- The third column holds the option to edit or delete
                            the current post --}}
                        <th class="py-3 px-6 text-center">Options</th>
                    </tr>
                </thead>

                <tbody class="text-gray-600 text-sm font-light">

                    {{-- Looping over each of the posts --}}
                    @foreach ($posts as $post)

                    {{-- tr means that a new row begins  --}}
                    <tr class="border-b border-gray-200 hover:bg-gray-100">

                        {{-- The first column in the new row --}}
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">

                                    {{-- The image of the post --}}
                                    <img class="w-6 h-6 rounded-full" src="{{ asset('storage/') . '/' . $post->thumbnail }}" alt="">
                                </div>

                                {{-- The title of the post with a link to a page that show the post  --}}
                                <span class="font-medium"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></span>
                            </div>
                        </td>

                        {{-- The second column in the current row --}}
                        <td class="py-3 px-6 text-left">
                            <div class="flex items-center">
                                {{-- the slug of the post --}}
                                <span>{{ $post->slug }}</span>
                            </div>
                        </td>

                        {{-- The third column in the current row --}}
                        <td class="py-3 px-6 text-center">
                            <span class="text-green-600 py-1 px-3 rounded-full text-xs">
                                {{-- A link to the edit post page --}}
                                <a href="/admin/posts/{{ $post->slug }}/edit">Edit</a> or
                                {{-- A small form that deletes the post --}}
                                <form  method="Post"  action="/admin/posts/delete/{{ $post->slug }}" >

                                    @method('DELETE')
                                    @csrf

                                    <button type="submit">Delete</button>

                                </form> Post

                            </span>
                        </td>

                    {{-- The end of the current row --}}
                    </tr>

                    @endforeach


                </tbody>

            </table>
        </div>
    </div>

</x-layout>
