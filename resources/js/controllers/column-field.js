let columnIndex = 2; // 1 is already there
let columnCount = 2;

function getColumnFieldContainer() {
    return document.getElementById('column-fields-container');
}

function addNewColumnField() {
    if (columnCount > 5) {
        alert('You can only have up to 5 columns when creating a new board. Don\'t worry, you can always add more columns later.');
        return
    }

    const columnFieldsContainer = getColumnFieldContainer();
    const columnField = document.querySelector('#column-fields-container #column-field-1');

    const newColumnField = document.createElement('div');
    newColumnField.id = `column-field-${columnIndex}`;
    newColumnField.classList = columnField.classList;
    newColumnField.innerHTML = `
        <input type="text" name="column[]" placeholder="e.g. To Do" required class="block w-full h-10 px-4 py-2 border border-medium-grey/25 rounded" />
        <button
            type="button"
            class="block h-10 bg-red/10 hover:bg-red/20 text-red w-10 rounded"
            onclick="removeColumnField(${columnIndex})"
        >
            x
        </button>
    `

    columnFieldsContainer.appendChild(newColumnField);

    columnIndex++;
    columnCount++;
}

function removeColumnField(index) {
    const columnFieldsContainer = getColumnFieldContainer();
    const columnField = document.getElementById(`column-field-${index}`);
    columnFieldsContainer.removeChild(columnField);
    columnCount--
}


window.addNewColumnField = addNewColumnField;
window.removeColumnField = removeColumnField;
