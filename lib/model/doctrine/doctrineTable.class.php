<?php

/**
 * doctrineTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class doctrineTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object doctrineTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('doctrine');
    }
}