@props(['name','originalValue'])


<textarea name={{ $name }} id={{ $name }} class="border-2" cols="30" rows="3">
    {{ old($name) ?? $originalValue ?? ''}}
    {{-- If there is an old value from failed validation use this.
        If there is no old value then use the original value.
        If the first two are null then put '', like when we create posts. --}}
</textarea>



