var icon = document.querySelector('.menu-icon');
document.querySelector('.menu-icon').addEventListener('click', function() {
        if(icon.textContent == "X"){
                document.querySelector('.menu-principal').style.left = '-250px'; 
                icon.textContent = ":::";
        }else{
                document.querySelector('.menu-principal').style.left = '0';
                icon.textContent = "X";
        }
});

document.querySelector('.menu-principal').addEventListener('click', function() {
        document.querySelector('.menu-principal').style.left = '-250px'; 
});

// Seleciona o botão
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

console.log("teste")
