@props(['name','originalValue'])

<input type={{ $name }} id={{ $name }} name={{ $name }}
                class="w-full border border-gray-300
                px-3 py-2 rounded-md focus:outline-none
                focus:border-blue-500"

                value="{{ old($name) ?? $originalValue ?? '' }}"
                {{-- If there is an old value from after failed validation then post this.
                    If there is no value from failed validation but there is an original value post this.
                    If there is no old value from failed validation and
                    no originalValue put nothing (this is the case when we create posts.) --}}

                required>

