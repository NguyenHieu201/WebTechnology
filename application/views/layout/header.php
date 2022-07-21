<?php
function endsWith($string, $endString)
{
  $len = strlen($endString);
  if ($len == 0) {
    return true;
  }
  return (substr($string, -$len) === $endString);
}

function linkHead($fileList)
{
  echo '<!DOCTYPE html>';
  echo '<html lang="en">';
  echo '<head>';
  echo '<meta charset="UTF-8">';
  echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
  foreach ($fileList as $fileName) {
    if (endsWith($fileName, ".css")) {
      echo '<link rel="stylesheet" href="' . $fileName . '">';
    }
    if (endsWith($fileName, ".js")) {
      echo '<script src="' . $fileName . '"></script>';
    }
  }
  echo '<title>Bookstore</title>';
  echo '</head>';
};