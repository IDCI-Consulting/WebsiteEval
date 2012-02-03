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

    $this->redirect('question_form', array(
      'evaluation_id' => $evaluation_id,
      'category_id' => $this->getUser()->getFirstQuestionCategoryId()
    ));
  }

  public function executeQuestionForm(sfWebRequest $request)
  {
    $evaluation = Doctrine_Core::getTable('Evaluation')->find($request->getParameter('evaluation_id'));
    $category = Doctrine_Core::getTable('QuestionCategory')->find($request->getParameter('category_id'));

    $options = array(
      'evaluation' => $evaluation,
      'questionCategory' => $category
    );

    $this->form = new QuestionsCategoryForm(array(), $options);
  }
  
  public function executeQuestionFormProcess(sfWebRequest $request)
  {
    $evaluation = Doctrine_Core::getTable('Evaluation')->find($request->getParameter('evaluation_id'));
    $category = Doctrine_Core::getTable('QuestionCategory')->find($request->getParameter('category_id'));

    if ($request->getParameter('target') == 'previous')
    {
      $this->redirect('question_form', array(
        'evaluation_id' => $evaluation->getId(),
        'category_id' => $this->getUser()->getPreviousQuestion($category->getId())
      ));
    }

    $options = array(
      'evaluation' => $evaluation,
      'questionCategory' => $category
    );

    $form = new QuestionsCategoryForm(array(), $options);

    $form->bind($request->getParameter($form->getName()));
    if($form->isValid())
    {
      $form->save();

      if ($request->getParameter('target') == 'next')
      {
        $category_id = $this->getUser()->getNextQuestion($category->getId());
        $this->redirect('question_form', array(
          'evaluation_id' => $evaluation->getId(),
          'category_id' => $category_id
        ));
      }

      if ($request->getParameter('target') == 'end')
      {
        $this->redirect('end_evaluation', array(
          'evaluation_id' => $evaluation->getId()
        ));
      }
    }

    $this->form = $form;
    $this->setTemplate('questionForm');
  }

  public function executeEndEvaluation(sfWebRequest $request)
  {
    $evaluation = Doctrine_Core::getTable('Evaluation')->find($request->getParameter('evaluation_id'));
    $evaluation->setIsOver(true);
    $evaluation->save();

    $total = null;
    $this->resultsCategories = EvaluationResult::run($evaluation, $total);
    $this->resultTotal = $total;
    $this->evaluation = $evaluation;
  }
}
