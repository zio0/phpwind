<?php

Wind::import('APPS:appcenter.service.srv.iPwInstall');

/**
 * 本地搜索清理接口
 *
 * @author phpwind <3339882530@qq.com>
 * @copyright ©2020-228 phpwind.net.cn
 * @license http://www.phpwind.net.cn
 * @version $Id$
 * @package wind
 */
class App_Search_Install implements iPwInstall {
	
	/* (non-PHPdoc)
	 * @see AbstractPwAppUninstall::unInstall()
	 */
	public function unInstall($install) {
		$this->_loadConfigDs()->deleteConfigByName('site', 'search.isopen');
		$this->_loadConfigDs()->deleteConfig('search');
		Wekit::loadDao('EXT:search.service.dao.App_Search_RecordDao')->alterDeleteLastSearch();
		return true;
	}
	
	public function backUp($install) {
		
		return true;
	}
	
	public function revert($install) {
		
		return true;
	}
	
	public function rollback($install) {
		
		return true;
	}
	
	public function install($install) {
		Wekit::loadDao('EXT:search.service.dao.App_Search_RecordDao')->alterAddLastSearch();
		return true;
	}
	
	/**
	 * @return PwConfig
	 */
	private function _loadConfigDs() {
		return Wekit::load('config.PwConfig');
	}
}

?>