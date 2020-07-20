<?php
defined('WEKIT_VERSION') or exit(403);

/**
 * 后台菜单添加
 */
class App_Feedback_ConfigDo
{

    /**
   
     * @param array $config
     * @return array
     */
    public function getAdminMenu($config)
    {
        $config += array(
            'app_feedback' => array('反馈应用', 'app/manage/*?app=feedback', '', '', 'appcenter'),
        );
        return $config;
    }
}
