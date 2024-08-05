<!DOCTYPE html>

<title>Admin Project</title>


<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<body class="p-8">
{{-- p-8 gives us some padding --}}

{{ $slot }}
<!-- The above means that what's
inside of "x-layout" in our views will
be inserted at this slot -->

    {{-- If a success flash message has been sent --}}
    @if (session('success'))

    <x-flash-message message="{{ session('success') }}"/>
    {{-- See "resources\views\components\flash-message.blade.php" --}}

    @endif

</body>
