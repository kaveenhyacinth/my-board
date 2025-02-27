@props(['name'])

<select name="{{$name}}" id="{{$name}}" class="block w-full p-2 border border-lines rounded">
    {{ $slot }}
</select>
