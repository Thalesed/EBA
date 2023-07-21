var icon = document.querySelector('.menu-icon');
document.querySelector('.menu-icon').addEventListener('click', function() {
	console.log("teste");
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

