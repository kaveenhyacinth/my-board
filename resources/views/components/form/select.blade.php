@props(['name'])

<select name="{{$name}}"
        id="{{$name}}" {{ $attributes->merge(['class' => 'block w-full p-2 border border-lines rounded']) }}>
    {{ $slot }}
</select>
