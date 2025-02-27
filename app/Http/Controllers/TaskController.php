<?php

    namespace App\Http\Controllers;

    use App\Models\Task;
    use Illuminate\Http\Request;

    class TaskController extends Controller
    {
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


            if(isset($request['subtask'])) {
                foreach ($request['subtask'] as $subtask) {
                    $task->subTasks()->create([
                        'title' => $subtask,
                    ]);
                }
            }

            return redirect("/boards/$boardId")->with('success', 'create-task');
        }
    }
