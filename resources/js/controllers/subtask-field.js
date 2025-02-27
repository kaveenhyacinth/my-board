let subtaskIndex = 2; // 1 is already there
let subtaskCount = 2;

function getSubtaskFieldContainer() {
    return document.getElementById('subtask-fields-container');
}

function addNewSubtaskField() {
    if (subtaskCount > 5) {
        alert('You can only have up to 5 subtasks when creating a new board. Don\'t worry, you can always add more subtasks later.');
        return
    }

    const subtaskFieldContainer = getSubtaskFieldContainer();

    const newSubtaskField = document.createElement('div');
    newSubtaskField.id = `subtask-field-${subtaskIndex}`;
    newSubtaskField.classList = 'mb-3 flex items-center gap-x-2';
    newSubtaskField.innerHTML = `
        <input type="text" name="subtask[]" placeholder="e.g. Make coffee" required class="block w-full h-10 px-4 py-2 border border-medium-grey/25 rounded" />
        <button
            type="button"
            class="block h-10 bg-red/10 hover:bg-red/20 text-red w-10 rounded"
            onclick="removeSubtaskField(${subtaskIndex})"
        >
            x
        </button>
    `

    subtaskFieldContainer.appendChild(newSubtaskField);

    subtaskIndex++;
    subtaskCount++;
}

function removeSubtaskField(index) {
    const subtaskFieldContainer = getSubtaskFieldContainer();
    const subtaskField = document.getElementById(`subtask-field-${index}`);
    subtaskFieldContainer.removeChild(subtaskField);
    subtaskCount--
}


window.addNewSubtaskField = addNewSubtaskField;
window.removeSubtaskField = removeSubtaskField;
