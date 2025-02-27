<?php

    namespace App\Http\Controllers;

    use App\Models\Board;

    class BoardController extends Controller
    {
        public function index()
        {
            return view('boards.index');
        }

        public function show(Board $board)
        {
            $board->load(['columns.tasks.subTasks']);
            $selectedBoardId = $board->id;
            return view('boards.show', [
                'board' => $board,
                'selectedBoardId' => $selectedBoardId,
            ]);
        }

        public function storeColumn(Board $board)
        {
            $validated = request()->validate([
                'name' => ['required', 'min:3'],
            ]);

            $board->columns()->create([
                'name' => $validated['name'],
                'order' => $board->columns()->count() + 1,
            ]);

            return redirect("/boards/$board->id")->with('success', 'create-column');
        }
    }
