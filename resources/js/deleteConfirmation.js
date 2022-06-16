const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // impedisce il ricaricamento della pagina

        // popup
        const confirmation = confirm('Sei sicuro di voler eliminare il post?');
        if (confirmation) {
            e.target.submit();
        }
        
    })
})