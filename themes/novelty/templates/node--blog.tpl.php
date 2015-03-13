<?php 
if (!$page) { 
?>

<article id="blog" class="post type-post blog-post-wrapper">
<div class="blog-post-content">
                <?php print render($content['field_custom']); ?>
                <div class="mb50"></div>

<div class="blog-content">
      <h2 class="post-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
   
      <div class="meta clearfix">
      <span class="meta-autor"><i class="icon-pencil"></i>  <?php print render($name) ?></span>
      <span class="meta-cat"><i class="icon-folder-open-alt"></i>
<?php
// Query database table taxonomy_term_data and taxonomy_index
// So I can get all terms from my node.
$term = db_query('SELECT t.name, t.tid FROM {taxonomy_index} n LEFT JOIN  {taxonomy_term_data} t ON (n.tid = t.tid) WHERE n.nid = :nid', array(':nid' => $node->nid));

// db_query in Drupal 7 returns a stdClass object. 
// Value names are corresponding to the fields in your SQL query 
//(in our case "t.name") AND t.tid for build path.
$tags = '';
foreach ($term as $record) {
  // I put l() function for make my links.
  $tags .= l($record->name, 'taxonomy/term/' . $record->tid) . ' ';
}

print ' ' . $tags;
?>
   </span>
   
   <span class="mata-date"><i class="icon-calendar"></i> <?php print format_date($node->created, 'custom', 'M.d.Y') ?></span>
   <span class="meta-comm"><i class="icon-comment-alt"></i><?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?>  <a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></span></div>
   
    <?php hide($content['comments']); hide($content['links']); print render($content); ?>
<div class="mb20"></div>
     <a href="<?php print $node_url; ?>" class="readmore">Read More<i class="icon-caret-right"></i></a>
</div><!-- end div .blog-content -->
</div><!-- end div .blog-post-content -->               
</article>
<div class="mb50"></div>

<?php } else { 

$acc = user_load(1);
?>

<article id="blog" class="post type-post blog-post single-post">
<div class="blog-post-content">
<div class="blog-content">

 <div class="meta clearfix">
      
<span class="meta-autor"><i class="icon-pencil"></i>  &nbsp;<?php print render($name) ?></span>
   
   <span class="mata-date"><i class="icon-calendar"></i>  &nbsp;<?php print format_date($node->created, 'custom', 'M.d.Y') ?></span>
   <span class="meta-comm"><i class="icon-comment-alt"></i><?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?>  <a href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 Comment', '@count Comments') ?></a><?php } ?></span></div>
  <?php hide($content['comments']); hide($content['links']); print render($content); ?>
  
  <div class="tagcloud clearfix"><i class="icon-tag"></i>
 <?php
// Query database table taxonomy_term_data and taxonomy_index
// So I can get all terms from my node.
$term = db_query('SELECT t.name, t.tid FROM {taxonomy_index} n LEFT JOIN  {taxonomy_term_data} t ON (n.tid = t.tid) WHERE n.nid = :nid', array(':nid' => $node->nid));

// db_query in Drupal 7 returns a stdClass object. 
// Value names are corresponding to the fields in your SQL query 
//(in our case "t.name") AND t.tid for build path.
$tags = '';
foreach ($term as $record) {
  // I put l() function for make my links.
  $tags .= l($record->name, 'taxonomy/term/' . $record->tid) . ' ';
}

print ' ' . $tags;
?>
  <br /></div>

</div><!-- end div .blog-content -->
</div><!-- end div .blog-post-content -->               
</article>
<div class="mb50"></div>
<?php print render($content['comments']); ?>      
<?php } ?>