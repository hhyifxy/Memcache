<?php
$memcache = new Memcache();
$memcache->addServer('localhost', 11211);
$memcache->connect('localhost', 11211);
$list = array();

$allSlabs = $memcache->getExtendedStats('slabs');
$items = $memcache->getExtendedStats('items');
foreach($allSlabs as $server => $slabs) {
  foreach($slabs AS $slabId => $slabMeta) {
    $cdump = $memcache->getExtendedStats('cachedump',(int)$slabId);
    foreach($cdump AS $keys => $arrVal) {
      if (!is_array($arrVal)) continue;
      foreach($arrVal AS $k => $v) {
        echo $k .'<br>';
      // print_r($memcache->get($k));
      }
    }
  }
}
