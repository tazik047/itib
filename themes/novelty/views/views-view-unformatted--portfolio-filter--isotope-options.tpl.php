<div class="page-title clearfix position-center"><ul class="clearfix position-center" id="filtrable">
    <li class="active"><a href="#" data-filter="*"><?php print t("All"); ?></a></li>
    <?php foreach ($rows as $id => $row): ?>
      <li <?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>