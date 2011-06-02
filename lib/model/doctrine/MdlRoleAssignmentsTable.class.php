<?php

/**
 * MdlRoleAssignmentsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MdlRoleAssignmentsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MdlRoleAssignmentsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MdlRoleAssignments');
    }
    
    public function getAssignments($contexts,$role){

        $q = $this->createQuery("ra")
                ->where("ra.contextid IN (".implode(",",$contexts).") ")
                ->andWhere("ra.role = ?", $role)
                ->fetchArray();
        
        return $q;
    }
}