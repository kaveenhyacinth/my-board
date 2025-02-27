<?php

    namespace App\Http\Controllers;

    use App\Models\SubTask;
    use App\Models\Task;
    use Illuminate\Http\Request;
    use Throwable;

    class SubTaskController extends Controller
    {
        public function store(Request $request, Task $task)
        {
            dd([
                'task' => $task,
                'request' => $request->all()
            ]);
        }

        /**
         * @throws Throwable
         */
        public function update(Request $request, Task $task, SubTask $subtask)
        {
            $boardId = $task->board_id;

            $subtask->updateOrFail([
                'completed' => $request->has('completed')
            ]);

            return redirect()->route('tasks.show', ['board' => $boardId, 'task' => $task->id])->with(
                'success',
                'update-subtask'
            );
        }
    }
