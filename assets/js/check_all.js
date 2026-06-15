document.getElementById('select-all').addEventListener('click', function(event) {
    let checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
});
