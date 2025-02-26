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
    }
