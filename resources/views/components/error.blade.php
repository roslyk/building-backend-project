@props(['name'])

@if ($errors->has( $name ))
    <div>
        <p style="color:red">{{ $errors->first( $name ) }}</p>
    </div>
@endif
