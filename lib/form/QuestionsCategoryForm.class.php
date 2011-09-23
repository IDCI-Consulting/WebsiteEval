<?php

class QuestionsCategoryForm extends sfForm
{
  const QUESTION_FORMAT =  'q_%d';

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
    $this->widgetSchema['evaluation_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['evaluation_id'] = new sfValidatorInteger();
    $this->setDefault('evaluation_id', $this->getEvaluation()->getId());
  
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
      
      if($answer = Doctrine_Core::getTable('Answer')->find(array(
        $this->getEvaluation()->getId(),
        $question->getId()
      ))) {
        $this->setDefault(
          self::getQuestionName($question->getId()),
          $answer->getValue()
        );
      }
      
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
    return sprintf(self::QUESTION_FORMAT, $question_id);
  }
  
  public function save()
  {
    $values = $this->getValues();
    $evaluation_id = $values['evaluation_id'];
    unset($values['evaluation_id']);
    
    foreach($values as $qid => $value)
    {
      sscanf($qid, self::QUESTION_FORMAT, $id);
      if ($id)
      {
        $answer = null;
        if(!$answer = Doctrine_Core::getTable('Answer')->find(array(
          $evaluation_id,
          $id
        ))) {
          $answer = new Answer();
          $answer->setEvaluationId($evaluation_id);
          $answer->setQuestionId($id);        
        }
        
        $answer->setValue($value);
        $answer->save();
      }
    }
  }
}
