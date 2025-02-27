@php
    $hasColumns = count($board->columns) > 0;
@endphp

@extends('layouts.app')

@section('title', $board->title)

@section('heading')
    <div class="h-full px-8 flex items-center justify-between border-b border-lines">
        <h1 class="text-black text-2xl font-semibold">{{ $board->title }}</h1>
        <div>
            <x-button class="{{ !$hasColumns ? 'bg-purple-light/30 hover:bg-purple-light/30 cursor-not-allowed' : '' }}"
                      :disabled="!$hasColumns">+ Add New Task
            </x-button>
        </div>
    </div>
@endsection

@section('content')
    @if(!$hasColumns)
        <div class="flex flex-col gap-y-8 items-center justify-center h-full">
            <p class="text-medium-grey text-lg font-semibold">This board is empty. Create a new column to get
                started.</p>
            <x-button>+ Add New Column</x-button>
        </div>
    @else
        <div class="overflow-scroll h-full p-4">
            <div class="flex gap-x-6 h-full">
                @foreach($board->columns as $column)
                    <div class="min-w-[280px] h-full">
                        <h4 class="text-xs tracking-[2.4px] font-semibold text-medium-grey uppercase">{{ $column->name }}
                            ({{count($column->tasks)}})</h4>
                        <div class="mt-4">
                            @foreach($column->tasks as $task)
                                <x-task.card>
                                    <p class="text-black text-[15px]/6 font-semibold">{{ $task->title }}</p>
                                    @if(count($task->subTasks) == 1)
                                        <p class="text-medium-grey text-xs font-semibold tracking-[0.02em]">{{ count($task->subTasks) }}
                                            sub task</p>
                                    @elseif(count($task->subTasks) > 1)
                                        <p class="text-medium-grey text-xs font-semibold tracking-[0.02em]">{{ count($task->subTasks) }}
                                            sub tasks</p>
                                    @endif
                                </x-task.card>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="pr-6 mt-8">
                    <button
                        data-modal-open="create-column"
                        class="min-w-[280px] bg-medium-grey/10 h-full flex flex-col justify-center items-center text-2xl text-medium-grey font-semibold">
                        + New Column
                    </button>
                </div>
            </div>

        </div>
    @endif
    <div>
    </div>
    <x-modal.create-column id="create-column"/>
@endsection
