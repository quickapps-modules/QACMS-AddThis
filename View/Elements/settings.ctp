<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Choose the sharing tool to display <em><b>above</b></em> each node:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="display:none;">
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

<?php echo $this->Html->useTag('fieldsetstart', '<span class="fieldset-toggle">' . __d('add_this', 'Choose the sharing tool to display <em><b>below</b></em> each node:') . '</span>'); ?>
    <div class="fieldset-toggle-container" style="display:none;">
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