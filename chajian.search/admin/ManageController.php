<?php
Wind::import('ADMIN:library.AdminBaseController');
Wind::import('SRV:config.srv.PwConfigSet');

/**
 * 本地搜索后台
 *
 * @author phpwind <3339882530@qq.com>
 * @copyright ©2020-228 phpwind.net.cn
 * @license http://www.phpwind.net.cn
 * @version $Id$
 * @package wind
 */
class ManageController extends AdminBaseController {

	/* (non-PHPdoc)
	 * @see WindController::run()
	 */
	public function run() {
		$conf['isopen'] = Wekit::C('site', 'search.isopen');
		$this->setOutput($conf, 'conf');
	}

	/**
	 * 保存搜索设置
	 *
	 */
	public function doRunAction() {
		$conf = $this->getInput('conf', 'post');
		$config = new PwConfigSet('site');
		$config->set('search.isopen', $conf['isopen'])
			->flush();
		$this->showMessage('success');
	}
	
}

?>