<?php

    // Add 3rd Party Affilaite Intregation

    class Wp_Proshots_Affialite_Integration {
        
        public function __construct() {
            
            $options = get_option('wp_proshots_options');
            $enable_affiliate = $options['wp_proshots_enable_affiliate'];
            $visible_area = $options['wp_proshots_affiliate_position'];

            if ($enable_affiliate == true && $visible_area == 'category-tag'){
                add_action('woocommerce_after_shop_loop', array($this,'wp_proshots_affiliate_integration'));
            }

            elseif ($enable_affiliate == true && $visible_area == 'single-product') {
                add_action('woocommerce_after_single_product', array($this,'wp_proshots_affiliate_integration'));
            }

        }
        
        public function wp_proshots_affiliate_integration(){
            
            $options = get_option('wp_proshots_options');
            $affiliate = $options['wp_proshots_select_affiliate'];

            if ($affiliate == 'shutterstock') {
                echo "<h2>".$options['wp_proshots_affiliate_heading_text']."</h2>";
                echo $options['wp_proshots_shutterstock_affiliate_code'];
            }

            elseif ($affiliate == 'depositphotos') {
                echo "<h2>".$options['wp_proshots_affiliate_heading_text']."</h2>";
                ?>
                <div class="dp-widget" data-dpw="24"></div>
                <script type="text/javascript">
                (function(){new dpw({
                    "format":"div",
                    "trackingLink":"<?php echo $options['wp_proshots_depositphotos_affiliate_url']; ?>",
                    "feedtype":"<?php echo $options['wp_proshots_depositphotos_affiliate_feed_type']; ?>",
                    "categorylist":"<?php echo $options['wp_proshots_depositphotos_affiliate_category_list']; ?>",
                    "searchquery":"<?php echo $options['wp_proshots_depositphotos_affiliate_search_query']; ?>",
                    "theme":"<?php echo $options['wp_proshots_depositphotos_affiliate_theme']; ?>",
                    "background":"<?php echo $options['wp_proshots_depositphotos_affiliate_theme_background']; ?>",
                    "photo":true,
                    "vector":true,
                    "video":true,
                    //"sort":"1",
                    "thumbsize":"specify_size",
                    "specify_size":"<?php echo $options['wp_proshots_depositphotos_affiliate_thumbnail_size']; ?>",
                    "feedwidth":"<?php echo $options['wp_proshots_depositphotos_affiliate_feed_width']; ?>",
                    "feedheight":"<?php echo $options['wp_proshots_depositphotos_affiliate_feed_height']; ?>",
                    "searchBar":<?php echo $options['wp_proshots_depositphotos_affiliate_search_bar']; ?>,
                    "showlogo":<?php echo $options['wp_proshots_depositphotos_affiliate_show_logo']; ?>,
                    "preview":<?php echo $options['wp_proshots_depositphotos_affiliate_thumbnail_preview']; ?>,
                    "limitpage":<?php echo $options['wp_proshots_depositphotos_affiliate_hide_pagination']; ?>,
                    "showborder":<?php echo $options['wp_proshots_depositphotos_affiliate_show_border']; ?>,
                    "responsive":true,
                    "wid":24,
                    "lang":"en"}).init(); })();
                </script>
                <?php
                // echo "<h2>".$options['wp_proshots_affiliate_heading_text']."</h2>";
                // echo file_get_contents('http://api.depositphotos.com/?dp_apikey=027145bbb8f1ed7126b98089bb1667c04f46f68c&dp_lang=en&dp_command=getWidget&dp_widget_config='.urlencode('{"format":"div",
                // "trackingLink":"'.$options['wp_proshots_depositphotos_affiliate_url'].'",
                // "feedtype":"'.$options['wp_proshots_depositphotos_affiliate_feed_type'].'",
                // "categorylist":"'.$options['wp_proshots_depositphotos_affiliate_category_list'].'",
                // "searchquery":"'.$options['wp_proshots_depositphotos_affiliate_search_query'].'",
                // "theme":"'.$options['wp_proshots_depositphotos_affiliate_theme'].'",
                // "background":"'.$options['wp_proshots_depositphotos_affiliate_theme_background'].'",
                // "photo":true,
                // "vector":true,
                // "video":true,
                // "sort":"'.$options['wp_proshots_depositphotos_affiliate_theme_background'].'",
                // "thumbsize":"specify_size",
                // "specify_size":"'.$options['wp_proshots_depositphotos_affiliate_thumbnail_size'].'",
                // "feedwidth":"'.$options['wp_proshots_depositphotos_affiliate_feed_width'].'",
                // "feedheight":"'.$options['wp_proshots_depositphotos_affiliate_feed_height'].'",
                // "searchBar":'.$options['wp_proshots_depositphotos_affiliate_search_bar'].',
                // "showlogo":'.$options['wp_proshots_depositphotos_affiliate_show_logo'].',
                // "preview":'.$options['wp_proshots_depositphotos_affiliate_thumbnail_preview'].',
                // "limitpage":'.$options['wp_proshots_depositphotos_affiliate_hide_pagination'].',
                // "showborder":'.$options['wp_proshots_depositphotos_affiliate_show_border'].',
                // "responsive":true,
                // "php":true,
                // "wid":60,
                // "lang":"en"}').'&dp_widget_referer='.urlencode(json_encode($_GET)));
            }

            else {
                return 0;
            }
        }

    }


    new Wp_Proshots_Affialite_Integration();
    
    