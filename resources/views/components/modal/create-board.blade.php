@props(['id'])

<x-modal.wrapper :$id>
    <div class="p-8">
        <h2 class="text-lg font-semibold text-black">Add New Board</h2>
        <form class="mt-6" action="/boards" method="POST">
            @csrf
            <x-form.group>
                <x-form.label for="title">Name</x-form.label>
                <x-form.input type="text" name="title" placeholder="e.g. Web Design" :value="old('title')" required/>
                <x-form.error name="title" />
            </x-form.group>
            <x-form.group>
                <x-form.label for="column[]">Columns</x-form.label>
                <div id="column-fields-container">
                    <div id="column-field-1" class="mb-3 flex items-center gap-x-2">
                        <x-form.input type="text" name="column[]" placeholder="e.g. To Do" required/>
                        <x-form.button
                            type="button"
                            class="bg-red/10 hover:bg-red/20 !text-red w-10 !rounded"
                            onclick="removeColumnField(1)"
                        >
                            x
                        </x-form.button>
                    </div>
                </div>
                <x-form.button
                    type="button"
                    class="bg-purple/10 hover:bg-purple/20 !text-purple"
                    onclick="addNewColumnField()"
                >
                    + Add New Column
                </x-form.button>
            </x-form.group>
            <x-form.button>Create Board</x-form.button>
        </form>
    </div>
</x-modal.wrapper>
