{{-- This is the flash message component that takes a message that disappears after 10 seconds/10000 milliseconds --}}
<div>
    <div    style="position: fixed;color: #007BFF;"
            class="text-3xl top-0 right-0 p-8 border-gray-500"

            
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 10000)"
            >
       {{$message}}

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
