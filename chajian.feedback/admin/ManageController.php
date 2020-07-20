<?php
defined('WEKIT_VERSION') or exit(403);
Wind::import('ADMIN:library.AdminBaseController');

class ManageController extends AdminBaseController
{
    public function beforeAction($handlerAdapter)
    {
        parent::beforeAction($handlerAdapter);
    }

    public function run()
    {
        $page = intval($this->getInput('page', 'get'));
        $page = $page ? $page : 1;
        $perpage = 20;
        $count = $this->_getFeedbackService()->getCount();

        $list = $this->_getFeedbackService()->getList($page, $perpage);

        $this->setOutput($page, 'page');
        $this->setOutput($perpage, 'perpage');
        $this->setOutput($count, 'count');
        $this->setOutput($list, 'list');
    }

    public function doDeleteAction()
    {
        $fid = $this->getInput('fid', 'post');
        if (!$fid || !$this->_getFeedbackService()->deleteFeedback($fid)) {
            $this->showError('operate.fail');
        }
        $this->showMessage('operate.success');
    }

    public function doBatchDeleteAction()
    {
        $fids = $this->getInput('fid', 'post');
        if (!$fids) {
            $this->showError('operate.select');
        }
        if (!$this->_getFeedbackService()->batchDeleteFeedback($fids)) {
            $this->showError('operate.fail');
        }
        $this->showMessage('operate.success');
    }

    private function _getFeedbackService()
    {
        return Wekit::load('EXT:feedback.service.App_Feedback');
    }
}
