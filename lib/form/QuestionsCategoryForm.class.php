<?php

class QuestionsCategoryForm extends sfForm
{
  public function getEvaluation()
  {
    return $this->getOption('evaluation');
  }
  
  public function getQuestionCategory()
  {
    return $this->getOption('questionCategory');
  }
  
  public function configure()
  {
    foreach($this->getQuestionCategory()->getQuestion() as $question)
    {
      $choices = array(
        1 => 'Pas du tout d\'accord',
        2 => 'Pas d\'accord',
        3 => 'D\'accord',
        4 => 'Tout à fait d\'accord'
      );
      
      $this->widgetSchema[self::getQuestionName($question->getId())] = new sfWidgetFormChoice(array(
        'choices' => $choices,
        'expanded' => true,
        'multiple' => false        
      ));
      
      $this->validatorSchema[self::getQuestionName($question->getId())] = new sfValidatorChoice(array(
        'choices' => array_keys($choices)
      ));
      
      $this->widgetSchema->setLabel(
        self::getQuestionName($question->getId()),
        $question->getText()
      );
    }
    
    $this->widgetSchema->setNameFormat('question_form[%s]');
  }
  
  public static function getQuestionName($question_id)
  {
    return sprintf('q_%d', $question_id);
  }
}
