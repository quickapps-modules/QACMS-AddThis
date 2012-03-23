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
        $cs = Configure::read('Modules.AddThis.settings.custom_selection');

        if ($this->__tmp['allowed_user'] &&
            (in_array('ANY', $nt) || !$nt || in_array($node['Node']['node_type_id'], $nt))
        ) {
            if (Configure::read('Modules.AddThis.settings.above_node.style')) {
                return $this->__addThis($node, 'above');
            }
        }
    }

    public function after_render_node($node) {
        $nt = (array)Configure::read('Modules.AddThis.settings.node_types');
        $cs = Configure::read('Modules.AddThis.settings.custom_selection');

        if ($this->__tmp['allowed_user'] &&
            (in_array('ANY', $nt) || !$nt || in_array($node['Node']['node_type_id'], $nt))
        ) {
            if (Configure::read('Modules.AddThis.settings.below_node.style')) {
                return $this->__addThis($node, 'below');
            }
        }
    }

    private function __addThis($node, $where) {
        $ht = "[add_this ";

        switch (Configure::read("Modules.AddThis.settings.{$where}_node.style")) {
            case 'custom':
                if ($size = Configure::read("Modules.AddThis.settings.{$where}_node.custom_size")) {
                    $ht .= "size={$size} ";
                }

                if ($services = Configure::read("Modules.AddThis.settings.{$where}_node.custom_services")) {
                    $ht .= "services='{$services}' ";
                }

                if ($more = Configure::read("Modules.AddThis.settings.{$where}_node.custom_more")) {
                    $ht .= "more=yes ";
                } else {
                    $ht .= "more=no ";
                }
            break;

            default:
                $ht .= 'style=' . Configure::read("Modules.AddThis.settings.{$where}_node.style") . ' ';
            break;
        }

        $ht .= "title='{$node['Node']['title']}' ";
        $ht .= "url='" . Router::url("/{$node['Node']['node_type_id']}/{$node['Node']['slug']}.html", true) . "' ";
        $ht .= " /]";

        return $this->hooktags($ht);
    }
}