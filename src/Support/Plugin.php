<?php
namespace DigitalUnited\Support;

class Plugin
{
    public static  function init() {
        DashboardPage::listen_for_action();
        Dashboard::listen_for_action();
        Backlog::listen_for_action();
        Issue::listen_for_action();
        Settings::listen_for_action();
    }

    public function plugin_activated() {

    }

}
