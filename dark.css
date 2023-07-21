    var darkModeToggle = document.getElementById('dark-mode-toggle');

    // Verifica se o usuário já está no modo escuro
    if (localStorage.getItem('darkModeEnabled')) {
        document.body.classList.add('dark-mode');
    }

    darkModeToggle.addEventListener('click', function() {
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove('dark-mode');
            localStorage.removeItem('darkModeEnabled');
            darkModeToggle.textContent = "Dark";
        } else {
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkModeEnabled', true);
            darkModeToggle.textContent = "Clear";
        }
    });

