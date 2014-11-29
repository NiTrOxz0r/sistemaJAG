<!-- se quedaron locos verdad? -->
<?php // http://stackoverflow.com/questions/1491020/php-get-the-latest-file-addition-in-a-directory
  $path = $_SERVER['DOCUMENT_ROOT']."/github/sistemaJAG/.git/refs/tags";

  $latest_ctime = 0;
  $version = '';

  $d = dir($path);
  while (false !== ($entry = $d->read())) :
    $filepath = "{$path}/{$entry}";
    // could do also other checks than just checking whether the entry is a file
    if (is_file($filepath) && filectime($filepath) > $latest_ctime) :
      $latest_ctime = filectime($filepath);
      $version = $entry;
    endif;
  endwhile;
?>
<h2>Version: <strong><?php echo $version ?></strong></h2>
<!-- google hire me, im available: slayerfat@gmail.com -->
