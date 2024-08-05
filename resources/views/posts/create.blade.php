<x-layout>

    <div class="max-w-md mx-auto">
    <form
    method="POST"

    {{-- The route that validates the post and creates it --}}
    action="/admin/posts/create"
    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
    enctype="multipart/form-data">

    @csrf



        <div class="mb-4">

            {{-- The title input  --}}
            <x-label name='title'/>

            <x-input name='title'/>

            <x-error name='title' />

        </div>


        {{-- Excerpt input --}}
        <div class="mb-6">
            <x-label name='excerpt'/>

            <x-textarea name='excerpt'/>

            <x-error name='excerpt' />

        </div>

        {{-- Body input --}}
        <div class="mb-6">
            <x-label name='body'/>

            <x-textarea name='body'/>

            <x-error name='body' />

        </div>

        {{-- Slug input --}}
        <div class="mb-4">
            <x-label name='slug'/>

               <x-input name='slug'/>

               <x-error name='slug' />
           </div>

        {{-- Thumbnail --}}
        <div class="mb-6">
            <x-label name='thumbnail'/>

            <input type="file" name='thumbnail' id="thumbnail">

            <x-error name='thumbnail' />

        </div>

        {{-- Here we choose the category_id needed to create a post --}}
        <div class="mb-6">
            <x-label name='category'/>

            {{-- The name of what we select is "category_id" --}}
            <select name="category_id" >

                {{-- Looping over the categories to make options in the dropdown menu --}}
                @foreach ( App\Models\Category::all() as $category )

                    {{-- The value of the options are the ids of the categories --}}
                    {{-- The written value of the options are the category names --}}
                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                @endforeach
            </select>

            <x-error name='category' />

        </div>




        <div class="flex items-center justify-between">

            <button

            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
                Create Post!
            </button>



        </div>
    </form>

</div>

</x-layout>


