<?php
class AddThisHookHelper extends AppHelper {
    public function before_render_node($node) {
        if ($n = Configure::read('Modules.AddThis.settings.above_node')) {
            return $this->__addThis($node, $n);
        }
    }

    public function after_render_node($node) {
        if ($n = Configure::read('Modules.AddThis.settings.below_node')) {
            return $this->__addThis($node, $n);
        }
    }
    
    private function __addThis($node, $style) {
        $ht = "[add_this 
            style={$style}
            url='" . Router::url("/{$node['Node']['node_type_id']}/{$node['Node']['slug']}.html", true) . "'
            title='{$node['Node']['title']}'
        /]";

        return $this->hooktags($ht);
    }
}