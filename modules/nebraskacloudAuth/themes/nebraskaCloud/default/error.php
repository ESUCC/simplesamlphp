<?php 
	$this->data['header'] = $this->t($this->data['dictTitle']);
	
	$this->data['head'] = '
<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noarchive, nofollow" />';
	
	$this->includeAtTemplateBase('includes/header.php'); 
?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-danger">
      <div class="panel-heading">
      <?php
      echo '<h4>' . $this->t($this->data['dictTitle']) . '</h4>';
      echo htmlspecialchars($this->t($this->data['dictDescr'], $this->data['parameters']));
      ?>
    </div>

<?php


/* Include optional information for error. */
if (isset($this->data['includeTemplate'])) {
	$this->includeAtTemplateBase($this->data['includeTemplate']);
}
?>
      <div class="panel-body">
        <div class="trackidtext">
            <?php echo $this->t('report_trackid'); ?>
            <span class="trackid"><?php echo $this->data['error']['trackId']; ?></span>
        </div>
      </div>
    </div>


<?php
/* Print out exception only if the exception is available. */
if ($this->data['showerrors']) {
?>
    <div class="panel panel-info">
      <div class="panel-heading"><h4><?php echo $this->t('debuginfo_header'); ?></h4></div>
      <div class="panel-body">
		<p><?php echo $this->t('debuginfo_text'); ?></p>
		
		<div style="border: 1px solid #eee; padding: 1em; font-size: x-small">
			<p style="margin: 1px"><?php echo htmlspecialchars($this->data['error']['exceptionMsg']); ?></p>
			<pre style=" padding: 1em; font-family: monospace; "><?php echo htmlspecialchars($this->data['error']['exceptionTrace']); ?></pre>
		</div>
      </div>
    </div>
<?php
}
?>

<?php
/* Add error report submit section if we have a valid technical contact. 'errorreportaddress' will only be set if
 * the technical contact email address has been set.
 */
if (isset($this->data['errorReportAddress'])) {
?>

    <div class="panel panel-info">
      <div class="panel-heading"><h4><?php echo $this->t('report_header'); ?></h4></div>
      <div class="panel-body">
        <form action="<?php echo htmlspecialchars($this->data['errorReportAddress']); ?>" method="post">
            <p><?php echo $this->t('report_text'); ?></p>
            <p><?php echo $this->t('report_email'); ?> <input type="text" size="25" name="email" value="<?php echo htmlspecialchars($this->data['email']); ?>" /></p>

            <p>
            <textarea name="text" rows="6" cols="43"><?php echo $this->t('report_explain'); ?></textarea>
            </p><p>
            <input type="hidden" name="reportId" value="<?php echo $this->data['error']['reportId']; ?>" />
            <input type="submit" name="send" value="<?php echo $this->t('report_submit'); ?>" />
            </p>
        </form>
      </div>
    </div>
<?php
}
?>

    <div class="alert alert-warning">
      <h4 style="clear: both"><?php echo $this->t('howto_header'); ?></h4>
      <?php echo $this->t('howto_text'); ?>
    </div>


    </div>
</div>
<?php $this->includeAtTemplateBase('includes/footer.php'); ?>