<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 28/06/13
 * Time: 10:41
 * To change this template use File | Settings | File Templates.
 */

class ProjectUserForm extends CFormModel{

    public $username;
    public $role;
    public $project;

    public function rules()
    {
        return array(
            array('username, role','required')
        );
        //return array();
    }
}