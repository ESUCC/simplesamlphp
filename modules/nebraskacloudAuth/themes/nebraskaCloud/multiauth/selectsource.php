<?php
$this->data['header'] = $this->t('{multiauth:multiauth:select_source_header}');

$this->includeAtTemplateBase('includes/header.php');

?>
<div class="row">
  <div class="col-md-4 col-md-offset-4" id="idpSelection">
  <center><h2><?php echo $this->t('{multiauth:multiauth:select_source_header}'); ?></h2></center>

  <p><center><?php echo $this->t('{multiauth:multiauth:select_source_text}'); ?></center></p>

  <form id="idPForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="get">
    <input type="hidden" name="AuthState" value="<?php echo htmlspecialchars($this->data['authstate']); ?>" />
    <input id="idPField" type="hidden" name="" value="" />

    <div class="form-group form-group-lg">
      <label for="idpSearchInput" class="sr-only sr-only-focusable">IdP Search</label>
      <input id="idpSearchInput" name="idpentityid" class="form-control typeahead" data-provider="typeahead" autocomplete="off" type="text" placeholder="Click/Type Here">
    </div>

<script>
  var substringMatcher = function(strs) {
	return function findMatches(q, cb) {
	  var matches, substringRegex;

	  // an array that will be populated with substring matches
	  matches = [];

	  // regex used to determine if a string contains the substring `q`
	  substrRegex = new RegExp(q, 'i');

	  // iterate through the pool of strings and for any string that
	  // contains the substring `q`, add it to the `matches` array
	  $.each(strs, function(i, str) {
		if (substrRegex.test(str.value)) {
		  matches.push(str);
		}
	  });

	  cb(matches);
	};
  };



  var providers = [
<?php

    foreach($this->data['sources'] as $source) {
    	if ((!isset($source['alias']) || trim($source['alias'])===''))
    	{
    		$name = htmlspecialchars('src-' . base64_encode($source['source']));
    	}
    	else
    	{
    		// an alias was defined in the authsources configuration
    		$name = htmlspecialchars('src-' . base64_encode($source['alias']));
    	}
    	$id = htmlspecialchars($source['source']);
      	$value = htmlspecialchars($this->t($source['text']));

echo <<<EOT
      {
        "name": "{$name}",
        "id": "button-{$id}",
        "value": "{$value}"
      },
EOT;
    }


?>
  ];

  $('#idpSelection .typeahead').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 0,
  },
  {
	  name: 'providers',
	  display: 'value',
	  source: substringMatcher(providers),
	  limit: 500
  });

  $('.typeahead').bind('typeahead:select', function(ev, suggestion) {
    var selected = {
      name: suggestion.name,
      value: suggestion.value
    };

    $('#idPField').attr(selected);

    $('#idPForm').submit();
  })
</script>



  </form>
  </div>
</div>
  <?php $this->includeAtTemplateBase('includes/footer.php'); ?>
