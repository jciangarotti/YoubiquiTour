<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title></title>
  </head>
  <body>
    <? foreach($animations -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($comedy -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($action -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($adventure -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($fantasy -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($romance -> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
    <? foreach($sci-> result() as $row): ?>
      <?
	$url = "http://www.imdb.com/find?s=all&q=";
	$array = $this->stringclass->setParserBuscador($row->movie_name);
	foreach ($array as $i => $value) {
	  $url = $url.$array[$i]."+";
      }?>
      <?=anchor($url, $row->movie_name)?>
      <?$url = "";?>
      <br/>
    <? endforeach; ?>
    <br/>
  </body>
</html>