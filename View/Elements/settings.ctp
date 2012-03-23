<?php
    $this->Layout->css('/add_this/css/settings-panel.css');
    $this->Layout->script('/add_this/js/settings-panel.js');
?>

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
    <div class="fieldset-toggle-container above-fieldset" style="<?php echo (isset($this->data['Module']['settings']['above_node']['style']) && $this->data['Module']['settings']['above_node']['style']) ? '' : 'display:none;'; ?>">
        <?php
            echo $this->Form->input('Module.settings.above_node.style',
                array(
                    'legend' => false,
                    'type' => 'radio',
                    'separator' => '<p>&nbsp;</p>',
                    'options' => array(
                        0 => __d('add_this', 'None'),
                        'custom' => __d('add_this', 'Build my own'),
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

        <div class="above-custom-settings">
            <div id="above-custom-settings" class="custom-settings" style="<?php echo (isset($this->data['Module']['settings']['above_node']['style']) && $this->data['Module']['settings']['above_node']['style'] == 'custom') ? '' : 'display:none;'; ?>">
                <?php
                    echo $this->Form->input('Module.settings.above_node.custom_size',
                        array(
                            'type' => 'select',
                            'label' => __d('add_this', 'Size'),
                            'options' => array(16 => '16x16', 32 => '32x32'),
                            'after' => '<br />' . __d('add_this', 'The size of the icons to display')
                        )
                    );
                ?>
                <br />
                <?php
                    echo $this->Form->input('Module.settings.above_node.custom_services',
                        array(
                            'label' => __d('add_this', 'Services to always show'),
                            'after' => '<br />' . __d('add_this', 'Enter a comma-separated list of <a href="%s" target="_blank">service codes</a>', 'http://www.addthis.com/services/list')
                        )
                    );
                ?>
                <br />
                <?php
                    echo $this->Form->input('Module.settings.above_node.custom_more',
                        array(
                            'type' => 'checkbox',
                            'label' => ' ' . __d('add_this', 'More'),
                            'after' => '<br />' . __d('add_this', 'Display iconic logo that offers sharing to over 330 destinations')
                        )
                    );
                ?>
            </div>
        </div>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Choose the sharing tool to display <em><b>below</b></em> each content:') . '</span>'); ?>
    <div class="fieldset-toggle-container below-fieldset" style="<?php echo (isset($this->data['Module']['settings']['below_node']['style']) && $this->data['Module']['settings']['below_node']['style']) ? '' : 'display:none;'; ?>">
        <?php
            echo $this->Form->input('Module.settings.below_node.style',
                array(
                    'legend' => false,
                    'type' => 'radio',
                    'separator' => '<p>&nbsp;</p>',
                    'options' => array(
                        0 => __d('add_this', 'None'),
                        'custom' => __d('add_this', 'Build my own'),
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

        <div class="below-custom-settings">
            <div id="below-custom-settings" class="custom-settings" style="<?php echo (isset($this->data['Module']['settings']['below_node']['style']) && $this->data['Module']['settings']['below_node']['style'] == 'custom') ? '' : 'display:none;'; ?>">
                <?php
                    echo $this->Form->input('Module.settings.below_node.custom_size',
                        array(
                            'type' => 'select',
                            'label' => __d('add_this', 'Size'),
                            'options' => array(16 => '16x16', 32 => '32x32'),
                            'after' => '<br />' . __d('add_this', 'The size of the icons to display')
                        )
                    );
                ?>
                <br />
                <?php
                    echo $this->Form->input('Module.settings.below_node.custom_services',
                        array(
                            'label' => __d('add_this', 'Services to always show'),
                            'after' => '<br />' . __d('add_this', 'Enter a comma-separated list of <a href="%s" target="_blank">service codes</a>', 'http://www.addthis.com/services/list')
                        )
                    );
                ?>
                <br />
                <?php
                    echo $this->Form->input('Module.settings.below_node.custom_more',
                        array(
                            'type' => 'checkbox',
                            'label' => ' ' . __d('add_this', 'More'),
                            'after' => '<br />' . __d('add_this', 'Display iconic logo that offers sharing to over 330 destinations')
                        )
                    );
                ?>
            </div>
        </div>
    </div>
<?php echo $this->Html->useTag('fieldsetend'); ?>

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