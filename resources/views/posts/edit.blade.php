<x-layout>

    {{-- This is the page where we edit posts --}}

    {{-- We use a form to edit the posts --}}
    <div class="max-w-md mx-auto">
    <form
        method="POST"

        action="/admin/posts/{{ $post->slug }}/update"
        {{-- We use the slug of the post to send the post
            to the 'update' method in AdminPostController --}}

        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"

        enctype="multipart/form-data">

    @csrf
    @method('patch')


        {{-- The admin can edit the title of the post --}}
        <div class="mb-4">

            {{-- Label --}}
            <x-label name='title'/>

            {{-- Input --}}
            <x-input name='title' originalValue="{{ $post->title }}"/>

            {{-- Error --}}
            <x-error name='title' />
        </div>


        {{-- Edit the excerpt --}}
        <div class="mb-6">
            <x-label name='excerpt'/>

            <x-textarea name='excerpt' originalValue='{{ $post->excerpt }}'/>

            <x-error name='excerpt' />

        </div>

        {{-- Edit the body --}}
        <div class="mb-6">
            <x-label name='body'/>

            <x-textarea name='body' originalValue='{{ $post->body }}'/>

            <x-error name='body' />

        </div>

        {{-- Edit slug --}}
        <div class="mb-4">
            <x-label name='slug'/>

               <x-input name='slug' originalValue='{{ $post->slug }}'/>

               <x-error name='slug' />
           </div>

        {{-- Give a new thumbnail --}}
        <div class="mb-6">
            <x-label name='thumbnail'/>

            <input type="file" name='thumbnail' id="thumbnail">

            <x-error name='thumbnail' />

        </div>

        {{-- Making a dropdown menu where the user can choose category
            and thereby give the post its category_id --}}
        <div class="mb-6">
            <x-label name='category'/>

            {{-- The fropdown menu --}}
            <select name="category_id" id="category_id">

                {{-- Looping over all categories --}}
                @foreach ( App\Models\Category::all() as $category )

                    {{-- If the current category is the post's category_id
                    then highlight select the current category name  --}}
                    @if ( $category->id == $post->category_id)
                        {{-- The value is the id and the displayed value is the name of the post --}}
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>

                    @else
                        {{-- Let the option value be the id. The displayed value is the name
                            of the category. --}}
                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endif

                @endforeach
            </select>

            <x-error name='category'/>

        </div>




        <div class="flex items-center justify-between">

            {{-- A submit button that edits the post  --}}
            <button

            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
                Edit Post!
            </button>



        </div>
    </form>

</div>

</x-layout>


