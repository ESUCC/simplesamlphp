<?php

$config = SimpleSAML_Configuration::getInstance();
$link = $config->getValue('nebraskacloudurl');

if(!empty($this->data['htmlinject']['htmlContentPost'])) {
	foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
		echo $c;
	}
}
?>
	</div>
    <!-- #content -->

    <footer id="footer" class="row">
	  <?php
	  if (!empty($link)) {
		echo '<a href="'. $link .'">NebraskaCloud</a>';
	  }
	  ?>

	</footer>
	<!-- #footer -->

</div><!-- #wrap -->

</body>
</html>
