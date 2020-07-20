<?php
defined('WEKIT_VERSION') or exit(403);

/**
 * App_Feedback_Dao - dao
 */
class App_Feedback_Dao extends PwBaseDao
{


    protected $_table = 'app_feedback';


    protected $_pk = 'fid';

  
    protected $_dataStruct = array('fid', 'name','usertel', 'content', 'created_time');

    public function add($fields)
    {
        return $this->_add($fields, true);
    }

    public function update($id, $fields)
    {
        return $this->_update($id, $fields);
    }

    public function delete($id)
    {
        return $this->_delete($id);
    }

    public function get($id)
    {
        return $this->_get($id);
    }

    public function getCount()
    {
        $sql = $this->_bindSql('SELECT COUNT(*) AS %s FROM %s', 'count', $this->getTable());
        $smt = $this->getConnection()->createStatement($sql);
        return $smt->getValue();
    }

    public function getList($page, $perpage)
    {
        list($start, $limit) = Pw::page2limit($page, $perpage);
        $sql = $this->_bindSql('SELECT * FROM %s ORDER BY fid DESC %s', $this->getTable(), $this->sqlLimit($limit, $start));
        $smt = $this->getConnection()->createStatement($sql);
        return $smt->queryAll();
    }

    public function deleteFeedback($fid)
    {
        return $this->_delete($fid);
    }

    public function batchDeleteFeedback($fids)
    {
        return $this->_batchDelete($fids);
    }
}
