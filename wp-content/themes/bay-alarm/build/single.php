<?php
  if (in_category('video')) { include (TEMPLATEPATH . '/single-video.php'); }
  elseif(in_category('senior-resource-guide')) { include (TEMPLATEPATH . '/single-senior-guide.php'); }
  else { include (TEMPLATEPATH . '/single-default.php'); }
?>
