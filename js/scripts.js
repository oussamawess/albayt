document.addEventListener('DOMContentLoaded', function() {
    const categories = document.querySelectorAll('.category');
    const sections = document.querySelectorAll('.offers');

    categories.forEach(category => {
        category.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            const target = this.getAttribute('data-target');

            sections.forEach(section => {
                if (section.id === target) {
                    section.classList.remove('hidden');
                } else {
                    section.classList.add('hidden');
                }
            });
        });
    });
});
