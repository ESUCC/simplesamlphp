<?php

$this->data['header'] = $this->t('{logout:title}');

$this->includeAtTemplateBase('includes/header.php');

//
//if(array_key_exists('link_text', $_REQUEST)) {
//	$text = $_REQUEST['link_text'];
//} else {
//	$text = '{logout:default_link_text}';
//}


echo <<<EOT
<div class="row">
  	<div class="col-md-6 col-md-offset-3">
	  	<h2>{$this->data['header']}</h2>
  		<p>{$this->t('{logout:logged_out_text}')}</p>
EOT;

if (!empty($this->data['link'])) {
  echo '<p><a href="' . $this->data['link'] . '" class="">' . $this->t($this->data['text']) . '</a></p>';
}
//{$this->t($this->data['text'])}

echo <<<EOT
	</div>
	<script>
	  setTimeout(function () {
		 window.location.href= '{$this->data['link']}';
	  },3000);
	</script>
</div>
EOT;

$this->includeAtTemplateBase('includes/footer.php');

?>