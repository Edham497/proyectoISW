<ham-header class="material-normal">
    <ham-logo>Guarderia Yocho</ham-logo>
    <ham-nav>
        <ham-item>Ayuda</ham-item>
        <ham-item>FAQ</ham-item>
    </ham-nav>
</ham-header>

<script>
    document.querySelector('ham-logo').onclick = ()=> window.location = '<?php echo constant('URL'); ?>'
    let items = document.querySelectorAll('ham-item')
    items[0].onclick= () => window.location = '<?php echo constant('URL'); ?>ayuda'
    items[1].onclick= () => window.location = '<?php echo constant('URL'); ?>ayuda/FAQ'
</script>