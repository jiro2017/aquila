<?php
/**
 * Footer template
 * 
 * @package Aquila
 */
?>

<footer>
    

    <?php 
        if( is_active_sidebar('sidebar-2')) {
            ?>
            <div class="container">
                <h3>Footer</h3>
                <aside>
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </aside>
            </div> 
            <?php
        }
    ?>
</footer>

    </div>
</div>
<?php
wp_footer();
?>
</body>
</html>