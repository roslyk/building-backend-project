<x-layout>
    <body class="bg-gray-100 h-screen flex">

        <div class="bg-white rounded shadow-md w-full max-w-md">
            <h2 class="font-bold text-2xl font-semibold mb-4">
                Login
            </h2>

            <!-- Form -->
            <form  method="POST" action="/login">

                @csrf
                {{-- Protection against "Cross Site Forgery Protection" --}}

                {{-- Email input --}}
                <div class="mb-4">
                    <label for="email" class="block  mb-1">
                        Email
                    </label>

                    <input type="email" id="email" name="email"
                        class="w-full border border-gray-300
                        px-3 py-2 rounded-md focus:outline-none
                        focus:border-blue-500"
                        value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <div>
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </div>

                <!-- Password Input -->
                <div class="mb-6 mt-4">
                    <label for="password" class="block  mb-1">Password</label>

                    <input type="password" id="password" name="password"
                        class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:border-blue-500"
                        placeholder="********" required>

                    @if ($errors->has('password'))
                        <div>
                            <p style="color:red">{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>

                {{-- The submit button --}}
                <button type="submit"
                    class="w-full text-white py-2
                    px-4 rounded-md bg-blue-500
                    hover:bg-blue-600 focus:outline-none
                    focus:shadow-outline-blue">
                    Log in!
                </button>

            </form>

</x-layout>
