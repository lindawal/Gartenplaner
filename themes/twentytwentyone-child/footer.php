<footer>
<!-- wichtig um scripte zu laden, welche über den Action-Hook 'wp-footer' eingebunden werden -->
<?php wp_footer(); ?> 

<hr>
<div class="my-footer-flex">
     
<p>
     <?php bloginfo('name'); echo ' &copy;'. date('Y');?>
</p>

<nav class="footer-nav">
<?php wp_nav_menu( array( 
     'theme_location' => 'footer',
     'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
     ) ); ?>
</nav>



<p>Nice Gardening GbR<br>
Schöne Allee, 12345 Hamburg<br>
0123 4567890</p>
</div>
</footer>
</div>
</body>

</html>