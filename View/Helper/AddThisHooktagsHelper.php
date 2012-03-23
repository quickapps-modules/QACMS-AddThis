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
        $title = $attr['title'] ? "addthis:title='" . str_replace("'", '"', __t($attr['title'])) . "' " : '';
        $u = $attr['pubid'] ? "&amp;pubid={$attr['pubid']}" : '';
        $attr['size'] = is_numeric($attr['size']) ? "{$attr['size']}x{$attr['size']}": $attr['size'];
        $attr['more'] = in_array($attr['more'], array(0, 'no', 'false'), true) ? false : true;

        if ($attr['services']) {
            $attr['services'] = preg_replace('/[^A-Za-z0-9,_]/', '', $attr['services']);
            $attr['services'] = explode(',', $attr['services']);
            $out .= '<!-- AddThis Button BEGIN -->' . "\n";
            $out .= '<div class="addthis_toolbox addthis_default_style addthis_' . $attr['size'] . '_style" ' . $url . $title .'>';

            foreach ((array)$attr['services'] as $service) {
                $out .= '<a class="addthis_button_' . $service . '"></a>';
            }

            if ($attr['more']) {
                $out .= '<a class="addthis_button_compact"></a>';
            }

            $out .= '</div>';
            $out .= "\n" . '<!-- AddThis Button END -->';
        } else {
            $sizeStyle = $attr['style'] == 2 ? 'addthis_32x32_style' : '';
            $out .= '<!-- AddThis Button BEGIN -->' . "\n";
            $out .= '<div class="addthis_toolbox addthis_default_style ' . $sizeStyle . '" ' . $url . $title .'>';

            switch ($attr['style']) {
                case 1:
                    case 2:
                        default:
                            $out .= '<a class="addthis_button_preferred_1"></a>';
                            $out .= '<a class="addthis_button_preferred_2"></a>';
                            $out .= '<a class="addthis_button_preferred_3"></a>';
                            $out .= '<a class="addthis_button_preferred_4"></a>';
                            $out .= '<a class="addthis_button_compact"></a>';
                break;

                case 3:
                    $out .= '<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>';
                    $out .= '<a class="addthis_button_tweet"></a>';
                    $out .= '<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>';
                    $out .= '<a class="addthis_counter addthis_pill_style"></a>';
                break;

                case 4:
                    $out .= '<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a><a class="addthis_button_tweet"></a><a class="addthis_counter addthis_pill_style"></a>';
                break;

                case 5:
                    $out .= '<a class="addthis_button_google_plusone" g:plusone:size="medium" ></a><a class="addthis_counter addthis_pill_style"></a>';
                break;

                case 6:
                    $out .= '<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250' . $u . '"' . $url . $title .'><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="' . __d('add_this', 'Bookmark and Share') . '" style="border:0"/></a>';
                break;

                case 7:
                    $out .= '<a href="http://www.addthis.com/bookmark.php?v=250' . $u . '" class="addthis_button_compact">' . __d('add_this', 'Share') . '</a>';
                    $out .= '<span class="addthis_separator">|</span>';
                    $out .= '<a class="addthis_button_preferred_1"></a>';
                    $out .= '<a class="addthis_button_preferred_2"></a>';
                    $out .= '<a class="addthis_button_preferred_3"></a>';
                    $out .= '<a class="addthis_button_preferred_4"></a>';
                break;

                case 8:
                    $out .= '<a href="http://www.addthis.com/bookmark.php?v=250' . $u . '" class="addthis_button_compact">' . __d('add_this', 'Share') . '</a>';
                break;

                case 9:
                    $out .= '<a class="addthis_counter"></a>';
                break;
            }
    
            $out .= '</div>';
            $out .= "\n" . '<!-- AddThis Button END -->';
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