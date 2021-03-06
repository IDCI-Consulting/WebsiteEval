<?php

/**
 * QuestionCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class QuestionCategory extends BaseQuestionCategory
{
  public function __toString()
  {
    return $this->getName();
  }

  public function getQuestionsForSiteType($site_type)
  {
    $q = Doctrine_Query::create()
        ->from('Question q')
        ->leftJoin('q.QuestionCategory qc')
        ->where('qc.id = ?', $this->getId())
        ->andWhere('q.site_type_id is NULL OR q.site_type_id = ?', $site_type->getId());

      return $q->execute();
  }
}
