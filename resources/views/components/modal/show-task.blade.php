@props(['id', 'board', 'task'])

@php
    $completedSubTasks = array_filter($task->subTasks->toArray(), fn($subtask) => $subtask['completed']);
    $completedSubtaskCount = count($completedSubTasks);
@endphp

<x-modal.show-wrapper :$id>
    <div class="p-8">
        <div>
            <h1 class="text-lg text-black font-semibold">{{ $task->title }}</h1>
        </div>
        <div class="mt-6">
            <p class="text-[13px]/6 text-medium-grey font-medium">{{ $task->description }}</p>
        </div>
        <div class="mt-6">
            <x-form.label>Subtasks ({{ $completedSubtaskCount }} of {{ count($task->subTasks) }})</x-form.label>
            <ul>
                @foreach($task->subTasks as $subtask)
                    <li class="p-2 flex items-center gap-x-2 bg-light-grey rounded mb-2">
                        <form action="/tasks/{{ $task->id }}/subtasks/{{ $subtask->id }}" method="POST"
                              class="flex gap-x-2">
                            @csrf
                            @method('PATCH')
                            <input id="{{ $subtask->id }}"
                                   name="completed"
                                   type="checkbox"
                                   data-id="{{ $subtask->id }}"
                                   onchange="submitForm(this)"
                                {{ $subtask->completed ? 'checked' : '' }}
                            />
                            <label for="{{ $subtask->id }}"
                                   class="{{ $subtask->completed ? 'line-through text-medium-grey' : '' }} text-xs">{{ $subtask->title }}</label>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-6">
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('PATCH')
                <x-form.label>Current Status</x-form.label>
                <x-form.select name="column_id" class="text-[13px]/6" onchange="submitForm(this)">
                    @foreach($board->columns as $column)
                        <option
                            value="{{ $column->id }}" {{ $column->id == $task->column->id ? 'selected' : '' }}>{{ $column->name }}</option>
                    @endforeach
                </x-form.select>
            </form>
        </div>
        <div class="mt-6">
            <x-form.button>Edit Task</x-form.button>
        </div>
    </div>
</x-modal.show-wrapper>

<script type="text/javascript">
    function closeShowTaskModal() {
        window.location = '/boards/{{ $board->id }}';
    }

    function submitForm(element) {
        const form = element.closest("form");
        form.submit();
    }
</script>
