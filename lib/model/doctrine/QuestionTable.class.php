<?php

/**
 * QuestionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class QuestionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object QuestionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Question');
    }
}