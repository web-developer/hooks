<?php

class shopHooksPlugin extends shopPlugin {

    //Frontend
    public function frontend_cart() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_category() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_checkout() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_error() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_footer() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_head() {
        if (!$this->isPluginEnabled())
            return;
        return '<!-- ' . $this->getHookContent(__FUNCTION__) . ' -->';
    }

    public function frontend_header() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_homepage() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_my() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_my_affiliate() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_my_nav() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_my_order() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_my_orders() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_nav() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_nav_aux() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function frontend_product() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'menu',
                    'cart',
                    'block_aux',
                    'block',
        ));
    }

    public function frontend_search() {
        return $this->getHookContent(__FUNCTION__);
    }

    //Backend
    public function backend_category_dialog() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function backend_customer() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'info_section',
                    'name_suffix',
                    'header',
                    'action_link',
        ));
    }

    public function backend_customers() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'sidebar_top_li',
                    'sidebar_section'
        ));
    }

    public function backend_customers_list() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'top_li',
        ));
    }

    public function backend_menu() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'aux_li',
                    'core_li',
                    'reports_li',
                    'orders_viewmode_li',
        ));
    }

    public function backend_order() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'title_suffix',
                    'action_button',
                    'action_link',
                    'info_section',
        ));
    }

    public function backend_order_edit() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function backend_orders() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'sidebar_top_li',
                    'sidebar_bottom_li',
                    'sidebar_section',
        ));
    }

    public function backend_product() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'title_suffix',
                    'action_button',
                    'toolbar_section',
                    'image_li',
                    'info_section',
                    'edit_section_li',
        ));
    }

    public function backend_product_edit() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'images',
                    'related',
        ));
    }

    public function backend_products() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'sidebar_top_li',
                    'sidebar_section',
                    'toolbar_export_li',
                    'toolbar_organize_li',
                    'toolbar_section',
                    'title_suffix',
                    'viewmode_li',
        ));
    }

    public function backend_reports() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'menu_li',
        ));
    }

    public function backend_set_dialog() {
        return $this->getHookContent(__FUNCTION__);
    }

    public function backend_settings() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'sidebar_top_li',
                    'sidebar_middle_li',
                    'sidebar_bottom_li',
        ));
    }

    public function backend_settings_discounts() {
        if (!$this->isPluginEnabled())
            return;
        return array(
            'name' => __FUNCTION__,
            'url' => '/README',
            'html' => $this->getHookContent(__FUNCTION__)
        );
    }

    public function backend_tutorial() {
        return $this->getHookArrayContent(__FUNCTION__, array(
                    'sidebar_li',
                    'sidebar_block',
        ));
    }

    //Rights
    public function rights_config($rights_obj) {
        if (!$this->isPluginEnabled())
            return;
        $rights_obj->addItem('hook_test', _wp('Use rights.config hook for adding new rule.'));
    }

    private function getHookContent($function_name = "") {
        $settings = $this->getSettings();
        if (isset($settings['enabled']) && $settings['enabled'] > 0) {
            $template = $settings['template'];
            if (!empty($template)) {
                $template = str_replace('%hookname%', $function_name, $template);
                return $template;
            } else {
                return $function_name;
            }
        }
    }

    private function getHookArrayContent($function_name = "", $hooks_array = array()) {
        if (!$this->isPluginEnabled())
            return;
        $hook_array = array();
        foreach ($hooks_array as $hook_name) {
            $hook_array[$hook_name] = $this->getHookContent($function_name . '.' . $hook_name);
        }
        return $hook_array;
    }

    private function isPluginEnabled() {
        $enabled = false;
        $settings = $this->getSettings();
        if (isset($settings['enabled']) && $settings['enabled'] > 0) {
            $enabled = true;
        }
        return $enabled;
    }

}
