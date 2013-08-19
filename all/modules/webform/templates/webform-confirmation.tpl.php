<?php

/**
 *  Modified to print booking dates and embed physician info from Views swh 8/9/13
 *
 * @file
 * Customize confirmation screen after successful submission.
 *
 * This file may be renamed "webform-confirmation-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-confirmation.tpl.php" to affect all webform confirmations on your
 * site.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $confirmation_message: The confirmation message input by the webform author.
 * - $sid: The unique submission ID of this submission.
 */
?>
<?php
function reg_confirmation_process_submission( &$submission ) {
    if ( $submission ) {
        $data = array(
            'sid' => $submission->sid,
            'name' => $submission->data[1]['value'][0],
            'phone' => $submission->data[3]['value'][0],
            'date' => $submission->data[4]['value'][0],
            'time' => $submission->data[5]['value'][0],
            'comment' => $submission->data[6]['value'][0],
            'email' => $submission->data[7]['value'][0],
            'physician(hidden)' => $submission->data[8]['value'][0],
        );
        return $data;
        print_r( $data );
    }
}
?>

<div class="webform-confirmation">
    <?php if ( $confirmation_message ): ?>
        <?php print $confirmation_message ?>
        <?php $nid = $node->nid; ?>
        <?php $submission = webform_menu_submission_load( $sid, $nid ); ?>
        <?php $data = reg_confirmation_process_submission( $submission ); ?>

    <!-- Print out some book online info -->
    <div class="confirm-bookonline-details">
            <?php $arg = $submission->data[1]['value'][0]; ?>
            <?php print  $arg; ?>
            <?php echo "<br />"; ?>
            <?php $arg = $submission->data[4]['value'][0]; ?>
            <?php print "Desired booking date: $arg"; ?>
            <?php echo "<br />"; ?>
            <?php $arg = $submission->data[5]['value'][0]; ?>
            <?php print "Desired booking time: $arg"; ?>
            <?php echo "<br />"; ?>
            <?php $arg = $submission->data[6]['value'][0]; ?>
            <?php print "Comment: $arg"; ?>
            <?php echo "<br />"; ?>       
    <?php else: ?>
        <p><?php print t( 'Thank you, your online booking using surgeonselector.com.' ); ?></p>
         <?php $submission = webform_menu_submission_load( $sid, $nid ); ?>
        <?php $data = reg_confirmation_process_submission( $submission ); ?>
    <?php endif; ?>
    <div>
<?php
// embed the view for the selected surgeon -swh 8/20/13
$arg = $submission->data[8]['value'][0];
print views_embed_view( 'surgforbookonlineconf', 'page', $arg );
?>
</div>
</div>

<div class="links">
  <a href="<?php print url( 'http://127.0.0.1/drupal-7.22' ) ?>"><?php print t( 'Return to home page' ) ?></a>
</div>

<!--
<a href="<?php print url( 'http://127.0.0.1/drupal-7.22/surgforbookonlineconf/'. $submission->data[8]['value'][0] ) ?>"><?php print t( 'View your submission details' ) ?></a>
</div>
-->