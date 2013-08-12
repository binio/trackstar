<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 27/06/13
 * Time: 10:13
 * To change this template use File | Settings | File Templates.
 */

class RbacCommand extends CConsoleCommand {

    private $_authManager;

    public function getHelp()
    {
        return '<<<EOD
                    USAGE
                      rbac
                    DESCRIPTION
                      This command generates an initial RBAC authorization hierarchy.
                    EOD';
    }

    public function run( $args )
    {
        if(($this->_authManager = Yii::app()->authManager) === null)
        {
            echo "configure authManager";
            return;
        }

    echo "This command will create roles: OWNER MEMBER READER\n";
    echo "CRUD for user\n";
    echo "CRUD for project\n";
    echo "CRUD for issue\n";
    echo "Yes/No?";

        if( !strncasecmp(trim(fgets(STDIN)),'y',1)){

            $this->_authManager->clearAll();

            //lowest lever opperations for user
            $this->_authManager->createOperation('createUser', 'create new user');
            $this->_authManager->createOperation('readUser', 'read  user');
            $this->_authManager->createOperation('updateUser', 'update user');
            $this->_authManager->createOperation('deleteUser', 'delete user');

            //lowest lever opperations for project
            $this->_authManager->createOperation('createProject', 'create new Project');
            $this->_authManager->createOperation('readProject', 'read  Project');
            $this->_authManager->createOperation('updateProject', 'update Project');
            $this->_authManager->createOperation('deleteProject', 'delete Project');

            //lowest lever opperations for issue
            $this->_authManager->createOperation('createIssue', 'create new Issue');
            $this->_authManager->createOperation('readIssue', 'read  Issue');
            $this->_authManager->createOperation('updateIssue', 'update Issue');
            $this->_authManager->createOperation('deleteIssue', 'delete Issue');

            //create reader role and permissions for it
            $role=$this->_authManager->createRole("reader");

            $role->addChild("readUser");
            $role->addChild("readProject");
            $role->addChild("readIssue");

            //create member role and permissions for it
            $role=$this->_authManager->createRole("member");

            $role->addChild("reader");
            $role->addChild("createIssue");
            $role->addChild("updateIssue");
            $role->addChild("deleteIssue");

            //create owner role and permissions for it
            $role=$this->_authManager->createRole("owner");

            $role->addChild("reader");
            $role->addChild("member");

            $role->addChild("createProject");
            $role->addChild("updateProject");
            $role->addChild("deleteProject");

            $role->addChild("createUser");
            $role->addChild("updateUser");
            $role->addChild("deleteUser");

            echo'Authorization hierarchy successful';
        }

    }

}