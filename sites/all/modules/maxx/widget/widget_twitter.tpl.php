<?php
	if (empty($title)) {
		print '<h3 class="widget-title first-word">';
			$title = t('Latest twitter');
			print $title;
		print '</h3>';
	}
?>
<?php
$twitter_username = $settings['widget_twitter_username'];
$tweets_count = $settings['widget_twitter_tweets_count'];
Global $base_url;
?>
  <ul id="twitter_update_list" class="widget-twitter">
    <li><p></p>
    </li>
  </ul>
  <br/><p><a href="http://twitter.com/<?php print $twitter_username; ?>" class="twitter-link" title="Follow me on twitter →">Follow me on twitter →</a></p>
  
  <script type="text/javascript" src="<?php print $base_url.'/'.drupal_get_path('theme', variable_get('theme_default', NULL));?>/yeah_tweety/twitter.js"></script>
  <script type="text/javascript" src="<?php print $base_url.'/'.drupal_get_path('theme', variable_get('theme_default', NULL));?>/yeah_tweety/get_tweet.php?url=statuses%2Fuser_timeline.json%3Fscreen_name%3D<?php print $twitter_username; ?>%26count%3D<?php print $tweets_count; ?>"></script>