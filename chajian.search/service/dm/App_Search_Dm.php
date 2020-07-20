<?php
Wind::import('SRV:user.dm.PwUserInfoDm');
/**
 * 搜索记录DM
 *
 * @author phpwind <3339882530@qq.com>
 * @copyright ©2020-228 phpwind.net.cn
 * @license http://www.phpwind.net.cn
 * @version $Id$
 * @package wind
 */
class App_Search_Dm extends PwUserInfoDm {

	public function setLastSearchTime($last_search_time) {
		$this->_data['last_search_time'] = intval($last_search_time);
		return $this;
	}
}