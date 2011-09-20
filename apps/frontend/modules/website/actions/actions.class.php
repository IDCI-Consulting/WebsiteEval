<?php

/**
 * website actions.
 *
 * @package    sf_sandbox
 * @subpackage website
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class websiteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->sites = Doctrine_Core::getTable('Site')->findAll();
  }
  
  public function executeInitEvaluation(sfWebRequest $request)
  {
    $questionCategories = Doctrine_Core::getTable('QuestionCategory')->findAll();
    
    $categories = array();
    foreach ($questionCategories as $questionCategory)
    {
      $categories[$questionCategory->getId()] = $questionCategory->getName();
    }
    $this->getUser()->setQuestionCategories($categories);

    $evaluation_id = null;
    if($request->hasParameter('site_id'))
    {
      $site_id = $request->getParameter('site_id');
      $eval = new Evaluation();
      $eval->setSiteId($site_id);
      $eval->save();
      $evaluation_id = $eval->getId();
    }
    else
    {
      $evaluation_id = $request->getParameter('evaluation_id');
    }
     
    $this->redirect('question', array(
      'evaluation_id' => $evaluation_id,
      'category_id' => $this->getUser()->getFirstQuestionCategoryId()
    ));
  }
  
  public function executeQuestion(sfWebRequest $request)
  {
    $this->evaluation_id = $request->getParameter('evaluation_id');
    $this->category_id = $request->getParameter('category_id');
    $this->questionCategory = Doctrine_Core::getTable('QuestionCategory')->find($this->category_id);
    $this->questions = $this->questionCategory->getQuestion();
  }
  
  public function executeQuestionForm(sfWebRequest $request)
  {
    $form = new QuestionsCategoryForm();
  }
}
