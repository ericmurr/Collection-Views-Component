<?php
/**
 * @version     1.0.3
 * @package     com_collectionviews
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Eric Murray <eric@altosmarketing.com> - http://ericmurray.me
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_collectionviews', JPATH_ADMINISTRATOR);
$doc = JFactory::getDocument();
$doc->addScript(JUri::base() . '/components/com_collectionviews/assets/js/form.js');


?>
</style>
<script type="text/javascript">
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', function() {
        jQuery(document).ready(function() {
            jQuery('#form-collectionitem').submit(function(event) {
                
		if(jQuery('#jform_file').val() != ''){
			jQuery('#jform_file_hidden').val(jQuery('#jform_file').val());
		}
            });

            
        });
    });

</script>

<div class="collectionitem-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-collectionitem" action="<?php echo JRoute::_('index.php?option=com_collectionviews&task=collectionitem.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
        
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />

	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />

	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />

	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('image'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('image'); ?></div>
	</div>
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('file'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('file'); ?></div>
	</div>
	<?php if (!empty($this->item->file)) : ?>
		<a href="<?php echo JRoute::_(JUri::base() . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_collectionviews' . DIRECTORY_SEPARATOR . 'uploaded-files' .DIRECTORY_SEPARATOR . $this->item->file, false);?>"><?php echo JText::_("COM_COLLECTIONVIEWS_VIEW_FILE"); ?></a>
	<?php endif; ?>
	<input type="hidden" name="jform[file]" id="jform_file_hidden" value="<?php echo $this->item->file ?>" />
	<div class="control-group">
		<div class="control-label"><?php echo $this->form->getLabel('note'); ?></div>
		<div class="controls"><?php echo $this->form->getInput('note'); ?></div>
	</div>
	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />

	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

	<?php if(empty($this->item->created_by)): ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />
	<?php else: ?>
		<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
	<?php endif; ?>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="validate btn btn-primary"><?php echo JText::_('JSUBMIT'); ?></button>
                <a class="btn" href="<?php echo JRoute::_('index.php?option=com_collectionviews&task=collectionitemform.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
            </div>
        </div>
        
        <input type="hidden" name="option" value="com_collectionviews" />
        <input type="hidden" name="task" value="collectionitemform.save" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
