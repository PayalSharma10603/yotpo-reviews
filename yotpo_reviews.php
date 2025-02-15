<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Yotpo_Reviews extends Module
{
    public function __construct()
    {
        $this->name = 'yotpo_reviews';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Payal Sharma';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Yotpo Reviews');
        $this->description = $this->l('Display Yotpo testimonials on product pages.');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('displayProductAdditionalInfo');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayProductAdditionalInfo($params)
    {
        // Replace 'YOUR_APP_KEY' with your actual Yotpo App Key from Yotpo dashboard
        $this->context->smarty->assign('yotpo_app_key', 'mvAg74CjYfCGNXFbDtHenar8FoeR58YbvlxMAVJX');
        return $this->display(__FILE__, 'views/templates/hook/yotpoTestimonials.tpl');
    }
}
