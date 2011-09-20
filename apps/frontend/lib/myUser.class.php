<?php

class myUser extends sfBasicSecurityUser
{
  public function setQuestionCategories($questionCategories)
  {
    $this->setAttribute('categories', $questionCategories);
  }
  
  public function getQuestionCategories()
  {
   return $this->getAttribute('categories');
  }
  
  public function getFirstQuestionCategoryId()
  {
    $keys = array_keys($this->getQuestionCategories());
    return $keys[0];
  }
  
  /**
   * getPreviousQuestion
   *
   * @param integer The question category id ...
   * @return integer id if found, false else
   */
  public function getPreviousQuestion($question_id)
  {
    $keys = array_keys($this->getQuestionCategories());
    foreach ($keys as $i => $key)
    {
      if($i > 0 && $key == $question_id)
      {
        return $keys[$i-1];
      }
    }
    return false;
  }
  
  /**
   * getNextQuestion
   *
   * @param integer The question category id ...
   * @return integer id if found, false else
   */
  public function getNextQuestion($question_id)
  {
    $keys = array_keys($this->getQuestionCategories());
    foreach ($keys as $i => $key)
    {
      if($i+1 != count($keys) && $key == $question_id)
      {
        return $keys[$i+1];
      }
    }
    return false;
  }
}
