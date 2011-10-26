<?php

/**
 * BaseEvaluation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $site_id
 * @property boolean $is_over
 * @property Site $Site
 * @property Doctrine_Collection $Answer
 * 
 * @method integer             getSiteId()  Returns the current record's "site_id" value
 * @method boolean             getIsOver()  Returns the current record's "is_over" value
 * @method Site                getSite()    Returns the current record's "Site" value
 * @method Doctrine_Collection getAnswer()  Returns the current record's "Answer" collection
 * @method Evaluation          setSiteId()  Sets the current record's "site_id" value
 * @method Evaluation          setIsOver()  Sets the current record's "is_over" value
 * @method Evaluation          setSite()    Sets the current record's "Site" value
 * @method Evaluation          setAnswer()  Sets the current record's "Answer" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEvaluation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('evaluation');
        $this->hasColumn('site_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('is_over', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Site', array(
             'local' => 'site_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Answer', array(
             'local' => 'id',
             'foreign' => 'evaluation_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}