<?php

/**
 * result actions.
 *
 * @package    sf_sandbox
 * @subpackage result
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class resultActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeShow(sfWebRequest $request)
  {
    $this->dealers = EvaluationTable::getRanking(SiteTable::DEALER);
    $this->showcases = EvaluationTable::getRanking(SiteTable::SHOWCASE);
  }
}
