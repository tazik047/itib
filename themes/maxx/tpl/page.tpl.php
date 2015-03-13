<div id="wrap-all">
        <!--header-->
        <?php include_once('header.tpl.php');?>
        <!--/header-->
        <style>
            #wrap-all {
                background-position:center 300px;
            }
        </style>
        
        <script>
            jQuery(window).resize(function () {
                jQuery('.container_skitter,.info_slide_dots').removeAttr('style');
            })
        </script>
		<?php if ($page['slideshow']): ?>
        <!--slider-->
        <?php print render($page['slideshow']); ?>
        <!--/slider-->
        <?php endif; ?>
        <!--main content-->
        <div id="main-content-wrapper" class="fixed-width-wrapper <?php if ($page['sidebar_second']) echo ' sidebar-right'; else echo ' sidebar-left';?>">
			<?php if ($breadcrumb):?>
			<!--breadcrums-->
            <div id="breadcrumb-wrapper" class="float-left">
				<?php print $breadcrumb; ?>
            </div>
            <!--/breadcrums-->
			<?php endif;?>
			
            <!--Page title-->
            <h1 class="page-title cufon first-word double-color"><?php if(arg(0)!=='node') print $title; ?></h1>
            <!--/Page title-->
			
			<?php if (isset($messages)) { print $messages; } ?>
            <!--content-->
            <div id="content" class="eq-h">
                <!--post entry-->
                <article class="post-entry">
                    <!--entry content-->
                    <div class="entry-content">
					<?php print render($page['content']); ?>
                       
                    </div>
                    <!--/entry content-->
                    
                </article>
                <!--/post entry-->
                
                <div class="clear"></div>
            </div>
            <!--/content-->
			<?php if ($page['sidebar_first'] || $page['sidebar_second']): ?>
            <!--Sidebar-->
            <div id="sidebar">
                <div class="sidebar-top"></div>
                <div class="sidebar-bottom"></div>
                <div class="sidebar-content eqh">
                    <div class="sidebar-content-wrapper">
                        <!-- begin generated sidebar -->
                        <?php 
							print render($page['sidebar_first']);
							print render($page['sidebar_second']);
						?>
                        <!-- end generated sidebar -->
                    </div>
                </div>
            </div>
            <!--/Sidebar-->
			<?php
				endif;
			?>
			<!--Content-->
            
        <!--/Content-->
    </div>
    <!--/main content-->
    <div class="clear"></div>
    <?php if ($page['subscription']): ?>
    <!--Get in touch-->
    <div id="get-in-touch-wrapper" class="full-width-wrapper">
        <div id="get-in-touch" class="fixed-width-wrapper">
			<div id="featured"><div class="section clearfix">
			<div class="icon"><span></span></div>
			  <?php print render($page['subscription']); ?>
			</div></div> <!-- /.section, /#featured -->
			<div class="clear"></div>
			<div class="subscribe-result"></div>
        </div>
    </div>
	<!--/Get in touch-->
	<?php endif; ?>
    
    
    <!--footer-->
    <footer id="footer-wrapper">
        <!--footer widget-->
        <div id="footer-widget-wrapper" class="full-width-wrapper">
            <div id="footer-widget-content" class="fixed-width-wrapper">
                <div class="one-third first">
                    <aside class="widget widget_md_twitter_widget">
                        
                        <?php if ($page['footer_one_column']): ?>
						
						  <?php print render($page['footer_one_column']); ?>
						
						
					  <?php endif; ?>
                    </aside>
                </div>
                <div class="one-third">
                    <aside class="widget md_flickr_widget">
						<?php if ($page['footer_two_column']): ?>
							<div id="featured"><div class="section clearfix">
							  <?php print render($page['footer_two_column']); ?>
							</div></div> <!-- /.section, /#featured -->
							
						  <?php endif; ?>
                    </aside>
                </div>
                <div class="one-third">
                    <aside class="widget md_post_widget_with_calendar">
					<?php if ($page['footer_three_column']): ?>
						  <?php print render($page['footer_three_column']); ?>
					  <?php endif; ?>
                    </aside>
                </div>
            </div>
        </div>
        <!--footer widget-->
        <div class="clear"></div>
        <!--footer content-->
        <div id="footer-extra-wrapper" class="full-width-wrapper">
            <div id="footer-info-content" class="fixed-width-wrapper">
				<?php print theme_get_setting('footer_copyright_message', 'maxx'); ?>
				<div class="credit float-right">
					<a href="#" class="back-to-top" title="Back to top">Back to top</a>
				</div>
            </div>
        </div>
        <!--footer content-->
    </footer>
    <!--/footer-->
    </div>