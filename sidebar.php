<aside id="sidebar" class="sidebar">
  <?php if (is_active_sidebar('sidebar-1')) : ?>
    <?php dynamic_sidebar('sidebar-1'); ?>
  <?php else : ?>
    <!-- Conteúdo padrão da barra lateral -->
  <?php endif; ?>
</aside>

