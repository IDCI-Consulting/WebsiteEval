<?php

/**
 * Question form base class.
 *
 * @method Question getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'text'             => new sfWidgetFormInputText(),
      'site_type_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteType'), 'add_empty' => true)),
      'question_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionType'), 'add_empty' => true)),
      'category_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionCategory'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'text'             => new sfValidatorPass(),
      'site_type_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteType'), 'required' => false)),
      'question_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionType'), 'required' => false)),
      'category_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('QuestionCategory'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Question';
  }

}
