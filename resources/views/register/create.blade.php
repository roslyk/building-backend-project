<x-layout>

    {{-- In this file we build the page where the visitor can register
        as a user --}}
    <body class="bg-gray-100 h-screen flex">

        <div class="bg-white rounded shadow-md w-full max-w-md">
            <h2 class="font-bold text-2xl font-semibold mb-4">Register</h2>

            <!-- Form -->
            <form method="POST" action="/register">


                @csrf
                {{-- Cross Site Request Forgery Protection --}}

                <!-- Name Input-->
                <div class="mb-4">
                    <label for="name" class="block  mb-1">
                        Name
                    </label>

                    <input type="name" id="name" name="name"
                        class="w-full border border-gray-300
                        px-3 py-2 rounded-md focus:outline-none
                        focus:border-blue-500"
                        value="{{ old('name') }}" required>

                    @if ($errors->has('name'))
                        <div>
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                    @endif

                </div>

                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block  mb-1">
                        Username (without spaces)
                    </label>

                    <input type="username" id="username" name="username"
                        class="w-full border border-gray-300
                        px-3 py-2 rounded-md focus:outline-none
                        focus:border-blue-500"
                        value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                    <div>
                        <p style="color:red">
                            {{ $errors->first('username') }}
                        </p>
                    </div>
                    @endif
                </div>




                <!-- Email Input -->
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
                <div class="mb-4">
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



                <!-- Submit Button -->
                <button type="submit"
                    class="w-full text-white py-2 px-4 rounded-md bg-blue-500 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue" >
                    Register!
                </button>
            </form>
        </div>

    </body>

</x-layout>
