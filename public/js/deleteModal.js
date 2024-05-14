let deleteBtns = document.querySelectorAll('.delete-btn');
let formTargetUrl = document.getElementById('delete-form').getAttribute('action');
deleteBtns.forEach( (deleteBtn) => {
    deleteBtn.addEventListener('click', function (){
        document.getElementById('delete-form').action = formTargetUrl + deleteBtn.getAttribute('data-delete-id');
    });
});
