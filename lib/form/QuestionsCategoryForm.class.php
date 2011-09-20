<?php

class QuestionsCategoryForm extends sfForm
{
  protected $evaluation;
  protected $questionCategory;
  
  public function __construct(Evaluation $evaluation, QuestionCategory $questionCategory)
  {
    $this->setEvaluation($evaluation);
    $this->setQuestionCategory($questionCategory);
  }
  
  
}
