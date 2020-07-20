<?php
defined('WEKIT_VERSION') or exit(403);
Wind::import('EXT:feedback.service.dm.App_Feedback_Dm');

/**
 * App_Feedback - 数据服务接口
 */
class App_Feedback
{

    /**
     * add record
     *
     * @param App_Feedback_Dm $dm
     * @return multitype:|Ambigous <boolean, number, string, rowCount>
     */
    public function add(App_Feedback_Dm $dm)
    {
        if (true !== ($r = $dm->beforeAdd())) {
            return $r;
        }
        return $this->_loadDao()->add($dm->getData());
    }

    /**
     * update record
     *
     * @param App_Feedback_Dm $dm
     * @return multitype:|Ambigous <boolean, number, rowCount>
     */
    public function update(App_Feedback_Dm $dm)
    {
        if (true !== ($r = $dm->beforeUpdate())) {
            return $r;
        }
        return $this->_loadDao()->update($dm->getId(), $dm->getData());
    }

    /**
     * get a record
     *
     * @param unknown_type $id
     * @return Ambigous <multitype:, multitype:unknown , mixed>
     */
    public function get($id)
    {
        return $this->_loadDao()->get($id);
    }

    /**
     * delete a record
     *
     * @param unknown_type $id
     * @return Ambigous <number, boolean, rowCount>
     */
    public function delete($id)
    {
        return $this->_loadDao()->delete($id);
    }

    /**
     * @return App_Feedback_Dao
     */
    private function _loadDao()
    {
        return Wekit::loadDao('EXT:feedback.service.dao.App_Feedback_Dao');
    }

    /**
     * get count
     */
    public function getCount()
    {
        return $this->_loadDao()->getCount();
    }

    /**
     * get list
     */
    public function getList($page, $perpage)
    {
        return $this->_loadDao()->getList($page, $perpage);
    }

    /**
     * 删除一条反馈信息.
     *
     * @param int $fid
     *
     * @return bool
     */
    public function deleteFeedback($fid)
    {
        $fid = (int) $fid;
        return $this->_loadDao()->deleteFeedback($fid);
    }

    /**
     * 批量删除反馈信息.
     *
     * @param array $fids
     *
     * @return bool
     */
    public function batchDeleteFeedback($fids)
    {
        if (!$fids || !is_array($fids)) {
            return false;
        }
        return $this->_loadDao()->batchDeleteFeedback($fids);
    }
}
