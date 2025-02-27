@props(['id', 'boardId'])

<x-modal.wrapper :$id>
    <div class="p-8">
        <h2 class="text-lg font-semibold text-black">Add New Column</h2>
        <form class="mt-6" action="/boards/{{ $boardId }}/columns" method="POST">
            @csrf
            <x-form.group>
                <x-form.label for="name">Name</x-form.label>
                <x-form.input type="text" name="name" placeholder="To Do" required/>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </x-form.group>
            <x-form.button>Create Column</x-form.button>
        </form>
    </div>
</x-modal.wrapper>
