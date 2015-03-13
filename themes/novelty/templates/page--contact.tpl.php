
<!-- BEGIN: WRAPPER -->
<div id="wrapper" class="<?php
if (theme_get_setting('novelty_boxed') == TRUE) {
    print 'boxed';
  }
  else {
   print 'boxed-none';
  }
?> 
 ">

    <!-- BEGIN: HEADER -->
<header id="header" class="clearfix text-center"> 

    <!-- BEGIN: TOP AREA -->
    <div id="top-area">
    <?php if ($page['top']): ?>
    <?php print render($page['top']); ?>
    <?php endif; ?>   
    
    <?php if($page['top_left'] || $page['top_right'] ) : ?>
            <div class="container">
            <div class="row">
                
                <div class="span6 top-text tl">
                <?php if ($page['top_left']): ?>
                <?php print render($page['top_left']); ?>
                <?php endif; ?> 
                </div>

                <div class="span6 text-right">
                 <?php if ($page['top_right']): ?>
                <?php print render($page['top_right']); ?>
                <?php endif; ?> 
                </div>

            </div>
        </div>
      <?php endif; ?>
    </div>
    <!-- END: TOP AREA -->

    <div class="container">   
            
        <!-- begin: logo -->
        <?php if ($logo) { ?><div id="logocontainer" class="logo"><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a></div><?php } ?>

        <!-- end: logo -->
        <!-- begin: menu -->
        <nav class="menu-main-menu-container">
        <?php print render($page['main_menu']); ?>
        </nav>        <!-- end: menu -->
        
    </div><!-- end: div.container  -->

</header>
<!-- END: HEADER -->
       <div id="content">
       <?php if ($page['full_slider']): ?>
       <div class="full-slider">
       <?php print render($page['full_slider']); ?>
       </div>
       <?php endif; ?>
         <div class="container">
    
          <div class="row">
   
        
            
            <?php if ($page['slider']): ?>
            <div class="slider span12">
            <?php print render($page['slider']); ?>
            <div><img src="<?php print base_path() . drupal_get_path('theme', 'novelty') ;?>/images/shadow.png" alt="shadow" style="width: 960px;"></div>
            </div><!-- /.slider -->
             <?php endif; ?>
             
            <?php if ($page['featured']): ?>
            <div class="featured span12">
            <?php print render($page['featured']); ?>
            </div><!-- /.featured -->
            <?php endif; ?>
            
             <?php if ($page['sidebar_first']): ?>
             <div class="span8 alignleft" id="content-area">
             <?php endif; ?>
             <?php if (!$page['sidebar_first']): ?>
             <div id="content-area" class="without span12">
             <?php endif; ?>
            
            
           
             <?php if ($messages): ?>
              <div id="messages">
              <?php print $messages; ?>
              </div>
             <?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
                                    
          </div><!-- end div#content-area -->
            
            <?php if ($page['sidebar_first']): ?>
            <!-- sidebar first -->
            <aside class="span4 " id="sidebar">
            <?php print render($page['sidebar_first']); ?>
            </aside>
            <!-- // sidebar first -->
           <?php endif; ?>
            
            
            
         <?php if ($page['bottom_content']): ?>
         
         <div id="bottom-content" class="bottom span12 aq-first cf">
         <div class="mb80"></div>
         <?php print render($page['bottom_content']); ?>
         
         </div>
         <?php endif; ?>
       </div><!-- end row -->  
    </div><!-- end div.container --> 
    <div class="mb80"></div>   
</div><!-- end div#content-->


    <footer id="footer">
        <div class="container">
            <div class="row">


<?php if ($page['footer_firstcolumn']): ?>
            <!-- .span3 -->
            <div class="span3">
<?php print render($page['footer_firstcolumn']); ?>
            </div><!-- /.span3 -->
<?php endif; ?>


<?php if ($page['footer_secondcolumn']): ?>
            <!-- .span3 -->
            <div class="span3">
<?php print render($page['footer_secondcolumn']); ?>
            </div><!-- /.span3 -->
 <?php endif; ?>

<?php if ($page['footer_thirdcolumn']): ?>
            <!-- .span3 -->
            <div class="span3">
<?php print render($page['footer_thirdcolumn']); ?>
            </div><!-- /.span3 -->
            
 <?php endif; ?>

<?php if ($page['footer_fourthcolumn']): ?>
            <!-- .span3 -->
            <div class="span3">
<?php print render($page['footer_fourthcolumn']); ?>
            </div><!-- /.span3 -->
<?php endif; ?> 
            </div><!-- end div.row -->
        </div><!-- end div.container -->
    </footer><!-- end footer#footer-->

        
<div class="copyright-area">
        <div class="container">
           <?php if ($page['footer_bottom']): ?>
           <?php print render($page['footer_bottom']); ?>
           <?php endif; ?> 
</div><!-- end div.container -->
    </div><!-- end div.copyright-area -->
    
</div><!-- end div #wrapper -->


  