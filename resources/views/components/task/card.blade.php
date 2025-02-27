@props(['board', 'task'])

<div class="w-full h-[88px] px-4 flex flex-col justify-center bg-white mb-5 rounded-lg shadow"
     onclick="goToTask(@json($board->id), @json($task->id))">
    {{ $slot }}
</div>

<script type="text/javascript">
    function goToTask(boardId, taskId) {
        window.location = `/boards/${boardId}/tasks/${taskId}`;
    }
</script>
