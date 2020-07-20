<?php
defined('WEKIT_VERSION') or exit(403);


class App_Feedback_Dm extends PwBaseDm
{
    protected $fid;

    /**
     * @return field_type
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * @param field_type $fid
     */
    public function setFid($fid)
    {
        $this->fid = $fid;
        return $this;
    }

    /**
     * set table name value
     *
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }


    /**
     * set table usertel value
     *
     * @param mixed $name
     */
    public function setUsertel($usertel)
    {
        $this->_data['usertel'] = $usertel;
    }






    /**
     * set table content value
     *
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->_data['content'] = $content;
    }

    /**
     * set table created_time value
     *
     * @param mixed $created_time
     */
    public function setCreatedTime($created_time)
    {
        $created_time = Pw::getTime();
        $this->_data['created_time'] = $created_time;
    }

    /* (non-PHPdoc)
     * @see PwBaseDm::_beforeAdd()
     */
    protected function _beforeAdd()
    {
        // TODO Auto-generated method stub
        //check the fields value before add
        return true;
    }

    /* (non-PHPdoc)
     * @see PwBaseDm::_beforeUpdate()
     */
    protected function _beforeUpdate()
    {
        // TODO Auto-generated method stub
        //check the fields value before update
        return true;
    }
}
