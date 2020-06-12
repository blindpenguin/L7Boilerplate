// Delete buttons
const deleteForm = document.getElementById('delete');
if(deleteForm) {
    deleteForm.addEventListener('click', function (event) {
        event.preventDefault();
        if (confirm('Do you really want to delete this element?')) {
            document.getElementById('confirm').checked = true;
            console.log(document.getElementById('confirm').checked)
            deleteForm.submit();
        }
    })
}
// End Delete buttons
