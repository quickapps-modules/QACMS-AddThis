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

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Custom bookmarks selection') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="<?php echo (isset($this->data['Module']['settings']['custom_selection']) && $this->data['Module']['settings']['custom_selection'] != 0) ? '' : 'display:none;'; ?>">
		<p><?php echo __d('add_this', 'If one or more of these choises are selected the previous style selections will be ignored'); ?></p>
        <?php
            echo $this->Form->input('Module.settings.custom_selection',
                array(
                    'type' => 'select',
                    'multiple' => 'checkbox',
                    'options' => array(
                        'addthis_button_facebook' => 'Facebook',//$this->Html->image('AddThis.toolbox-small.png'),
                        'addthis_button_facebook_like' => 'Facebook Like',
                        'addthis_button_facebook_send' => 'Facebook Send',
                        'addthis_button_twitter' => 'Twitter',
                        'addthis_button_tweet' => 'Tweet',
                        'addthis_button_twitter_follow_native' => 'Twitter Follow Native',
                        'addthis_button_google' => 'Google',
                        'addthis_button_google_plusone' => 'Google +1',
                        'addthis_button_google_plusone_badge' => 'Google +1 Badge',
                        'addthis_button_pinterest' => 'Pinterest',
                        'addthis_button_foursquare' => 'Foursquare',
                        'addthis_button_button' => 'AddThis Button',
                        'addthis_button_button_compact' => 'AddThis Button Compact',
                        'addthis_button_amazonwishlist' => 'Amazon Wishlist',
                        'addthis_button_email' => 'Email'
                    )
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