@props(['name', 'message'])

@error($name)
<p id="form-error" class="text-red text-xs mt-2">{{ $message }}</p>
@enderror
