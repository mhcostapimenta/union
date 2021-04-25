<?php
function convertToDate($parametro) {
  $newDate = date('d/m/Y', strtotime($parametro));
  return $newDate;
}