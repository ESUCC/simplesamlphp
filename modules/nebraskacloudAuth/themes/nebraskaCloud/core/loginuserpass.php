<?php
$this->data['header'] = $this->t('{login:user_pass_header}');

if (strlen($this->data['username']) > 0) {
  $this->data['autofocus'] = 'password';
}
else {
  $this->data['autofocus'] = 'username';
}
$this->includeAtTemplateBase('includes/header.php');

?>
<?php
if ($this->data['errorcode'] !== NULL) {
?>
<div class="row">
  <div class="col-md-4 col-md-offset-4 alert alert-danger">
    <p><strong><?php echo htmlspecialchars($this->t('{errors:title_' . $this->data['errorcode'] . '}', $this->data['errorparams'])); ?></strong></p>
    <p><?php echo htmlspecialchars($this->t('{errors:descr_' . $this->data['errorcode'] . '}', $this->data['errorparams'])); ?></p>
  </div>
</div>
<?php
}
?>

<div class="row">
<div class="col-md-4 col-md-offset-4">


  <h2><?php echo $this->t('{login:user_pass_header}'); ?></h2>

  <p class="logintext"><?php echo $this->t('{login:user_pass_text}'); ?></p>

  <form action="?" method="post" name="f">
    <div class="form-group">

      <label for="username" class="<?php echo ($this->data['forceUsername']) ? '' : 'sr-only sr-only-focusable'; ?>"><?php echo $this->t('{login:username}'); ?></label>
      <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $this->t('{login:username}'); ?>" value="<?php echo  htmlspecialchars($this->data['username']); ?>">
    </div>
    <div class="form-group">
      <label for="password"  class="sr-only sr-only-focusable"><?php echo $this->t('{login:password}'); ?></label>
      <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo $this->t('{login:password}'); ?>">
    </div>
    <button type="submit" name="regularsubmit" value="login" class="btn btn-default">Submit</button>
    <input type="submit" tabindex="5" id="mobilesubmit" value="Login" class="sr-only">


  <?php
    foreach ($this->data['stateparams'] as $name => $value) {
      echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
    }
  ?>
  </form>
  </div>
</div>
<?php

if (!empty($this->data['links'])) {
  echo '<ul class="links" style="margin-top: 2em">';
  foreach ($this->data['links'] AS $l) {
    echo '<li><a href="' . htmlspecialchars($l['href']) . '">' . htmlspecialchars($this->t($l['text'])) . '</a></li>';
  }
  echo '</ul>';
}

echo <<<EOT
<div class="row">
  <div class="loginHelpAlert col-md-4 col-md-offset-4 alert alert-warning">
    <h4> {$this->t('{login:help_header}')} </h4>
    {$this->t('{login:help_text}')}
  </div>
</div>
EOT;


$this->includeAtTemplateBase('includes/footer.php');
?>
