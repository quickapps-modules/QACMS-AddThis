<?php
class AddThisHookHelper extends AppHelper {
    private $__tmp = array();

    public function beforeRender() {
        if (!QuickApps::is('view.admin')) {
            $ur = (array)Configure::read('Modules.AddThis.settings.user_roles');
            $in = false;

            foreach ((array)QuickApps::userRoles() as $r) {
                if (in_array($r, $ur)) {
                    $in = true;
                    break;
                }
            }

            $this->__tmp['allowed_user'] = in_array(0, $ur) || empty($ur) || $in;
        } else {
            $this->__tmp['allowed_user'] = false;
        }
    }

    public function before_render_node($node) {
        $nt = (array)Configure::read('Modules.AddThis.settings.node_types');
        $cs = (bool)Configure::read('Modules.AddThis.settings.custom_selection');

        if ($this->__tmp['allowed_user'] &&
            (in_array('ANY', $nt) || !$nt || in_array($node['Node']['node_type_id'], $nt))
        ) {
            if ($n = Configure::read('Modules.AddThis.settings.above_node')) {
                return $this->__addThis($node, $n, $cs);
            }
        }
    }

    public function after_render_node($node) {
        $nt = (array)Configure::read('Modules.AddThis.settings.node_types');
        $cs = (bool)Configure::read('Modules.AddThis.settings.custom_selection');

        if ($this->__tmp['allowed_user'] &&
            (in_array('ANY', $nt) || !$nt || in_array($node['Node']['node_type_id'], $nt))
        ) {
            if ($n = Configure::read('Modules.AddThis.settings.below_node')) {
                return $this->__addThis($node, $n, $cs);
            }
        }
    }

    private function __addThis($node, $style, $custom_selection) {
        $cs = ($custom_selection?'true':'false');
        $ht = "[add_this 
            style={$style}
            custom_selection={$cs}
            url='" . Router::url("/{$node['Node']['node_type_id']}/{$node['Node']['slug']}.html", true) . "'
            title='{$node['Node']['title']}'
        /]";

        return $this->hooktags($ht);
    }
}