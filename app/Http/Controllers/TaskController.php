<?php

    namespace App\Http\Controllers;

    use App\Models\Board;
    use App\Models\Task;
    use Illuminate\Http\Request;

    class TaskController extends Controller
    {
        public function show(Board $board, Task $task)
        {
            $board->load(['columns.tasks.subTasks']);
            $selectedBoardId = $board->id;

            return view('boards.show', [
                'board' => $board,
                'selectedBoardId' => $selectedBoardId,
                'selectedTask' => $task,
            ]);
        }

        public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => ['required'],
            ]);
            $boardId = $request['board_id'];

            $task = Task::create([
                'title' => $validated['title'],
                'description' => $request['description'],
                'column_id' => $request['column_id'],
                'board_id' => $request['board_id'],
            ]);


            if (isset($request['subtask'])) {
                foreach ($request['subtask'] as $subtask) {
                    $task->subTasks()->create([
                        'title' => $subtask,
                    ]);
                }
            }

            // return redirect("/boards/$boardId")->with('success', 'create-task');
            return redirect()->route('boards.show', ['board' => $boardId])->with('success', 'create-task');
        }

        public function patch(Request $request, Task $task)
        {
            if (isset($request['column_id'])) {
                $task->update([
                    'column_id' => $request['column_id'],
                ]);
            }

            return redirect()->route('tasks.show', ['board' => $task->board_id, 'task' => $task->id]);
        }
    }
