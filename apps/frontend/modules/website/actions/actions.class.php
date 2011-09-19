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
}
