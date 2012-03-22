<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'AddThis account settings (just for analytics purpose):') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="display:none;">
        <?php
            echo $this->Form->input('Module.settings.pubid',
                array(
                    'label' => __d('add_this', 'Profile ID (for old accounts is the same as <em><b>username</b></em>)'),
                    'type' => 'text'
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Display only for this content types:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="display:none;">
        <?php
            echo $this->Form->input('Module.settings.node_types',
                array(
                    'label' => __d('add_this', 'Content Types'),
                    'type' => 'select',
                    'multiple' => true,
                    'options' => array_merge(array('ANY' => __d('add_this', 'ANY')), ClassRegistry::init('Node.NodeType')->find('list'))
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Display only to user roles:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="display:none;">
        <?php
            echo $this->Form->input('Module.settings.user_roles',
                array(
                    'label' => __d('add_this', 'User Roles'),
                    'type' => 'select',
                    'multiple' => true,
                    'options' => array_merge(array(0 => __d('add_this', 'ANY')), ClassRegistry::init('User.Role')->find('list'))
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Choose the sharing tool to display <em><b>above</b></em> each content:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="<?php echo (isset($this->data['Module']['settings']['above_node']) && $this->data['Module']['settings']['above_node'] != 0) ? '' : 'display:none;'; ?>">
        <?php
            echo $this->Form->input('Module.settings.above_node',
                array(
                    'legend' => false,
                    'type' => 'radio',
                    'separator' => '<p>&nbsp;</p>',
                    'options' => array(
                        0 => __d('add_this', 'None'),
                        1 => $this->Html->image('AddThis.toolbox-small.png'),
                        2 => $this->Html->image('AddThis.toolbox-large.png'),
                        3 => $this->Html->image('AddThis.fb-tw-p1-sc.jpg.png'),
                        4 => $this->Html->image('AddThis.fb-tw-sc.jpg'),
                        5 => $this->Html->image('AddThis.plusone-share.gif'),
                        6 => $this->Html->image('AddThis.button.jpg'),
                        7 => $this->Html->image('AddThis.small-toolbox.jpg'),
                        8 => $this->Html->image('AddThis.share.jpg'),
                        9 => $this->Html->image('AddThis.share_counter.png'),
                    )
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Choose the sharing tool to display <em><b>below</b></em> each content:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="<?php echo (isset($this->data['Module']['settings']['below_node']) && $this->data['Module']['settings']['below_node'] != 0) ? '' : 'display:none;'; ?>">
        <?php
            echo $this->Form->input('Module.settings.below_node',
                array(
                    'legend' => false,
                    'type' => 'radio',
                    'separator' => '<p>&nbsp;</p>',
                    'options' => array(
                        0 => __d('add_this', 'None'),
                        1 => $this->Html->image('AddThis.toolbox-small.png'),
                        2 => $this->Html->image('AddThis.toolbox-large.png'),
                        3 => $this->Html->image('AddThis.fb-tw-p1-sc.jpg.png'),
                        4 => $this->Html->image('AddThis.fb-tw-sc.jpg'),
                        5 => $this->Html->image('AddThis.plusone-share.gif'),
                        6 => $this->Html->image('AddThis.button.jpg'),
                        7 => $this->Html->image('AddThis.small-toolbox.jpg'),
                        8 => $this->Html->image('AddThis.share.jpg'),
                        9 => $this->Html->image('AddThis.share_counter.png'),
                    )
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Custom bookmarks selection:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="<?php echo (isset($this->data['Module']['settings']['custom_selection']) && $this->data['Module']['settings']['custom_selection'] != 0) ? '' : 'display:none;'; ?>">
		<p><?php echo __d('add_this', 'If at least one custom bookmark has inserted the previous template style selections will be ignored. It will be preserved the eventual choice for big or small icons.
						  <br/>Note that if you want bookmarks on top or/and on the bottom of the node select an item different than <strong><em>None</em></strong>.'); ?></p>
		<p><?php echo __d('add_this', 'Possible values:<br/>
						  facebook, facebook_like, facebook_send, twitter, tweet, twitter_follow_native, google, google_plusone, google_plusone_badge,
						  pinterst, foursquare, addthis_button, addthis_button_compact, amazonwishlist, email.'); ?></p>
        <?php
            echo $this->Form->input('Module.settings.custom_selection',
                array(
					'label' => __d('add_this', 'Insert a comma separated list'),
                    'type' => 'text'
                )
            );
        ?>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<script>
    $(document).ready(function() {
        $('#ModuleSettingsAboveNode0').click(function() {
            $('.fieldset-toggle-container').eq(2).toggle();
        });

        $('#ModuleSettingsBelowNode0').click(function() {
            $('.fieldset-toggle-container').eq(3).toggle();
        });
    });
</script>