<?php
defined('WEKIT_VERSION') or exit(403);


class IndexController extends PwBaseController
{
    public function beforeAction($handlerAdapter)
    {
        parent::beforeAction($handlerAdapter);
    }

    public function run()
    {
        //TODO Insert your code here
    }

    public function doaddAction()
    {
        $this->getRequest()->isPost() || $this->showError('operate.fail');

        list($name, $usertel, $content, $created_time) = $this->getInput(array('name', 'usertel', 'content', 'created_time'), 'post');

         

        Wind::import('EXT:feedback.service.dm.App_Feedback_Dm');
        $feedbackDm = new App_Feedback_Dm();
        $feedbackDm->setName($name);
        $feedbackDm->setUsertel($usertel);
        $feedbackDm->setContent($content);
        $feedbackDm->setCreatedTime($created_time);
        
    
        
        if (($result = $this->_getFeedbackDs()->add($feedbackDm)) instanceof PwError) {
            $this->showError($result->getError());
        }
        
      
        
        
        $this->showMessage('operate.success');
    }

    private function _getFeedbackDs()
    {
        return Wekit::load('EXT:feedback.service.App_Feedback');
    }
}
