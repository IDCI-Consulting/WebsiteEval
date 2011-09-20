<?php

/**
 * Answer form base class.
 *
 * @method Answer getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnswerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'evaluation_id' => new sfWidgetFormInputHidden(),
      'question_id'   => new sfWidgetFormInputHidden(),
      'value'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'evaluation_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('evaluation_id')), 'empty_value' => $this->getObject()->get('evaluation_id'), 'required' => false)),
      'question_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('question_id')), 'empty_value' => $this->getObject()->get('question_id'), 'required' => false)),
      'value'         => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('answer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Answer';
  }

}
