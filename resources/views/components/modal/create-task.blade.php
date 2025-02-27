@props(['id', 'board'])

<x-modal.create-wrapper :$id>
    <div class="p-8">
        <h2 class="text-lg font-semibold text-black">Add New Task</h2>
        <form class="mt-6" action="/tasks" method="POST">
            @csrf
            <input type="hidden" name="board_id" value="{{ $board->id }}">
            <x-form.group>
                <x-form.label for="title">Title</x-form.label>
                <x-form.input type="text" name="title" placeholder="e.g. Take coffee break" :value="old('title')"
                              required/>
                <x-form.error name="title"/>
            </x-form.group>
            <x-form.group>
                <x-form.label for="description">Description</x-form.label>
                <x-form.textarea
                    name="description"
                    placeholder="e.g. It’s always good to take a break. This 15 minute break will recharge the batteries a little."
                    :value="old('description')"
                />
            </x-form.group>
            <x-form.group>
                <x-form.label for="subtask[]">Subtasks</x-form.label>
                <div id="subtask-fields-container">
                    <div id="subtask-field-1" class="mb-3 flex items-center gap-x-2">
                        <x-form.input type="text" name="subtask[]" placeholder="e.g. Make coffee" required/>
                        <x-form.button
                            type="button"
                            class="bg-red/10 hover:bg-red/20 !text-red !w-10 !rounded"
                            onclick="removeSubtaskField(1)"
                        >
                            x
                        </x-form.button>
                    </div>
                </div>
                <x-form.button
                    type="button"
                    class="bg-purple/10 hover:bg-purple/20 !text-purple"
                    onclick="addNewSubtaskField()"
                >
                    + Add New Subtask
                </x-form.button>
            </x-form.group>
            <x-form.group>
                <x-form.label for="column_id">Status</x-form.label>
                <x-form.select name="column_id" class="block w-full p-2 border border-lines rounded">
                    @foreach($board->columns as $column)
                        <option value="{{ $column->id }}">{{ $column->name }}</option>
                    @endforeach
                </x-form.select>
                <x-form.error name="column_id"/>
            </x-form.group>
            <x-form.button>Create Task</x-form.button>
        </form>
    </div>
</x-modal.create-wrapper>
