<?php
class AddThisHooktagsHelper extends AppHelper {
    private $__addThisCount = 0;

    public function add_this($attr = array()) {
        $out = '';
        $attr = array_merge(
            array(
                'style' => 1,
                'services' => false,
                'url' => false,
                'title' => false,
                'pubid' => Configure::read('Modules.AddThis.settings.pubid'),
                'size' => 16,
                'more' => 'yes'
            ),
            (array)$attr
        );

        $url = $attr['url'] ? "addthis:url='" . Router::url($attr['url'], true) . "' " : '';
        $title = $attr['title'] ? "addthis:title='" . __t($attr['title']) . "' " : '';
        $u = $attr['pubid'] ? "&amp;pubid={$attr['pubid']}" : '';
        $attr['size'] = is_numeric($attr['size']) ? "{$attr['size']}x{$attr['size']}": $attr['size'];
        $attr['more'] = in_array($attr['more'], array(0, 'no', 'false'), true) ? false : true;

        if ($attr['services']) {
            $attr['services'] = preg_replace('/[^A-Za-z0-9,]/', '', $attr['services']);
            $attr['services'] = explode(',', $attr['services']);
            $out .= '<!-- AddThis Button BEGIN -->';
            $out .= '<div class="addthis_toolbox addthis_default_style addthis_' . $attr['size'] . '_style" ' . $url . $title .'>';

            foreach ((array)$attr['services'] as $service) {
                $out .= '<a class="addthis_button_' . $service . '"></a>';
            }

            if ($attr['more']) {
                $out .= '<a class="addthis_button_compact"></a>';
            }

            $out .= '</div>';
            $out .= '<!-- AddThis Button END -->';
        } else {
            switch ($attr['style']) {
                case 1:
                    case 2:
                        default:
                            $class = $attr['style'] == 2 ? 'addthis_32x32_style' : '';
                            $out .= '
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style ' . $class . '" ' . $url . $title .'>
                                    <a class="addthis_button_preferred_1"></a>
                                    <a class="addthis_button_preferred_2"></a>
                                    <a class="addthis_button_preferred_3"></a>
                                    <a class="addthis_button_preferred_4"></a>
                                    <a class="addthis_button_compact"></a>
                                    <a class="addthis_counter addthis_bubble_style"></a>
                                </div>
                                <!-- AddThis Button END -->
                            ';
                break;

                case 3:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style " ' . $url . $title .'>
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;

                case 4:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a href="http://www.addthis.com/bookmark.php?v=250' . $u . '" class="addthis_button_compact">' . __d('add_this', 'Share') . '</a>
                            <span class="addthis_separator">|</span>
                            <a class="addthis_button_preferred_1"></a>
                            <a class="addthis_button_preferred_2"></a>
                            <a class="addthis_button_preferred_3"></a>
                            <a class="addthis_button_preferred_4"></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;

                case 5:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a class="addthis_button_google_plusone" g:plusone:size="medium" ></a><a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;

                case 6:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a class="addthis_counter"></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;

                case 7:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet"></a><a class="addthis_counter addthis_pill_style"></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;

                case 8:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a href="http://www.addthis.com/bookmark.php?v=250' . $u . '" class="addthis_button_compact">' . __d('add_this', 'Share') . '</a>
                        </div>
                    ';
                break;

                case 9:
                    $out .= '
                        <!-- AddThis Button BEGIN -->
                        <div class="addthis_toolbox addthis_default_style "' . $url . $title .'>
                            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250' . $u . '"' . $url . $title .'><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="' . __d('add_this', 'Bookmark and Share') . '" style="border:0"/></a>
                        </div>
                        <!-- AddThis Button END -->
                    ';
                break;
            }
        }

        if (!$this->__addThisCount) {
            $u = $attr['pubid'] ? "#pubid={$attr['pubid']}" : '';
            $out .= '
                <script>var addthis_config = {"data_track_clickback":true,"data_track_addressbar":false};if (typeof(addthis_share) == "undefined"){ addthis_share = [];}</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js' . $u . '"></script>
            ';
        }

        $this->__addThisCount++;

        return $out;
    }
}