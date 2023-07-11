<!doctype html>
<html>
        <head>
                <!-- Required meta tags -->
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <?php wp_head(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
        </head>
<body>

<link rel="icon" type="image/jpeg" href="<?php echo get_template_directory_uri(); ?>/favicon.jpeg">

<h1 class="titulo">
<div class="menu-icon">
	:::
</div>
<span class="separator"></span>
	<?php
$descricao_site = get_bloginfo('title');
echo $descricao_site;
?>

<button class="dark" id="dark-mode-toggle">
Dark
</button>
</h1>

<nav class="menu">
<?php
 wp_nav_menu( array(
    'theme_location' => 'menu-principal',
  'container' => 'nav',
  'container_class' => 'menu-principal'
  ) );
  ?>
</nav>



<script>
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
    
    // Adiciona um ouvinte de evento para o clique no botão
    darkModeToggle.addEventListener('click', function() {
        // Verifica se o modo escuro está ativado ou desativado
        if (document.body.classList.contains('dark-mode')) {
            // Desativa o modo escuro
            document.body.classList.remove('dark-mode');
            localStorage.removeItem('darkModeEnabled');
        } else {
            // Ativa o modo escuro
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkModeEnabled', true);
        }
    });


</script>



