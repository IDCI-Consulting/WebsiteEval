<?php

class EvaluationResult
{

  const SCORE_SCALE = 100;
  const MAX_SCORE_BY_QUESTION = 4;

  /**
   * Run compute the web site score for a given evaluation
   *
   * @param Evaluation $evaluation to compute
   * @param The total score
   * @return array Result order by QuestionCategory
   */
  public static function run(Evaluation $evaluation, & $total = null)
  {
    $answers = $evaluation->getAnswer();

    $tmp = array();

    foreach ($answers as $answer) {

      $categoryName = $answer->getQuestion()->getQuestionCategory()->getName();
      if (!isset($tmp[$categoryName])) {
         $tmp[$categoryName] = array('score' => 0, 'count' => 0);
      }

      $score = $tmp[$categoryName]['score'];
      $count = $tmp[$categoryName]['count'];

      $tmp[$categoryName] = array(
        'score' => $score + $answer->getValue(),
        'count' => $count + 1
      );
    }

    $ret = array();
    $i = 0;
    $total_value = 0;
    foreach($tmp as $categoryName => $result)
    {
      $score = ($result['score'] * self::SCORE_SCALE) / ($result['count'] * self::MAX_SCORE_BY_QUESTION);
      $ret[$categoryName] = sprintf('%.2f/%d',
        $score,
        self::SCORE_SCALE
      );
      $total_value += $score;
      $i++;
    }

    $total = sprintf('%.2f/%d',
      $total_value,
      $i * self::SCORE_SCALE
    );

    return $ret;
  }
}
