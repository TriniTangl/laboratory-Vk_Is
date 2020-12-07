<?
namespace App\TPR;
class Lab1 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function maxymaxCalculate($data, $bestAlternative = true) {
    $value = $data[0][0];
    $numberRowAlternative = 0;
    $resultData = array();
    foreach ($data as $index => $row) {
      foreach ($row as $column) {
        if ($bestAlternative) {
          if ($column > $value) {
            $value = $column;
            $numberRowAlternative = $index;
          }
        } else {
          if ($column < $value) {
            $value = $column;
            $numberRowAlternative = $index;
          }
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    return $resultData;
  }
  public function valdaCalculate($data, $bestAlternative = true) {
    $value = -1;
    $numberRowAlternative = 0;
    $resultData = array();
    $valuesFromEachRow = array();
    foreach ($data as $row) {
      $suitableValueFromRow = $row[0];
      foreach ($row as $column) {
        if ($bestAlternative) {
          if ($column < $suitableValueFromRow)
            $suitableValueFromRow = $column;
        } else {
          if ($column > $suitableValueFromRow)
            $suitableValueFromRow = $column;
        }
      }
      array_push($valuesFromEachRow, $suitableValueFromRow);
    }
    $value = $valuesFromEachRow[0];
    foreach ($valuesFromEachRow as $index => $suitableValue) {
      if ($bestAlternative) {
        if ($suitableValue > $value) {
          $value = $suitableValue;
          $numberRowAlternative = $index;
        }
      } else {
        if ($suitableValue < $value) {
          $value = $suitableValue;
          $numberRowAlternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    return $resultData;
  }
  public function gurvitsaCalculate($data, $q, $bestAlternative = true) {
    $value = -1;
    $numberRowAlternative = 0;
    $resultData = array();
    $minValuesFromEachRow = array();
    $maxValuesFromEachRow = array();
    foreach ($data as $row) {
      $suitableMinValueFromRow = $row[0];
      $suitableMaxValueFromRow = $row[0];
      foreach ($row as $column) {
        if ($bestAlternative) {
          if ($column < $suitableMinValueFromRow)
            $suitableMinValueFromRow = $column;
          if ($column > $suitableMaxValueFromRow)
            $suitableMaxValueFromRow = $column;
        } else {
          if ($column > $suitableMinValueFromRow)
            $suitableMinValueFromRow = $column;
          if ($column < $suitableMaxValueFromRow)
            $suitableMaxValueFromRow = $column;
        }
      }
      array_push($minValuesFromEachRow, $suitableMinValueFromRow);
      array_push($maxValuesFromEachRow, $suitableMaxValueFromRow);
    }
    $value = $q * $minValuesFromEachRow[0] + (1 - $q) * $maxValuesFromEachRow[0];
    for ($i = 0; $i < count($minValuesFromEachRow); $i++) {
      $calculatedValues = $q * $minValuesFromEachRow[$i] + (1 - $q) * $maxValuesFromEachRow[$i];
      if ($bestAlternative) {
        if ($calculatedValues > $value) {
          $value = $calculatedValues;
          $numberRowAlternative = $i;
        }
      } else {
        if ($calculatedValues < $value) {
          $value = $calculatedValues;
          $numberRowAlternative = $i;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    return $resultData;
  }
  public function bayesaLaplasaCalculate($data, $probability, $bestAlternative = true) {
    $value = -1;
    $numberRowAlternative = 0;
    $resultData = array();
    $newDataArray = array();
    foreach ($data as $row) {
      $newRowData = array();
      foreach ($row as $index => $column) {
        array_push($newRowData, $column * $probability[$index]);
      }
      array_push($newDataArray, $newRowData);
    }
    $value = array_sum($data[0]);
    foreach ($newDataArray as $index => $row) {
      if ($bestAlternative) {
        if (array_sum($row) > $value) {
          $value = array_sum($row);
          $numberRowAlternative = $index;
        }
      } else {
        if (array_sum($row) < $value) {
          $value = array_sum($row);
          $numberRowAlternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    return $resultData;
  }
}
?>

<?
namespace App\TPR;
class Lab2 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function savage_calculate($data, $bestAlternative = true) {
    $numberRowAlternative = 0;
    $resultData = array();
    $riskDataArray = array();
    $maxValuesFromEachColumn = $data[0];
    $maxValuesFromEachRow = array();
    foreach ($data as $row) {
      foreach ($row as $index => $column) {
        if ($column > $maxValuesFromEachColumn[$index]) {
          $maxValuesFromEachColumn[$index] = $column;
        }
      }
    }
    foreach ($data as $row) {
      $riskRowData = array();
      foreach ($row as $index => $column) {
        array_push($riskRowData, $maxValuesFromEachColumn[$index] - $column);
      }
      array_push($riskDataArray, $riskRowData);
    }
    foreach ($riskDataArray as $row) {
      $suitableMaxValuesFromRow = $row[0];
      foreach ($row as $column) {
        if ($column > $suitableMaxValuesFromRow)
          $suitableMaxValuesFromRow = $column;
      }
      array_push($maxValuesFromEachRow, $suitableMaxValuesFromRow);
    }
    $value = $maxValuesFromEachRow[0];
    foreach ($maxValuesFromEachRow as $index => $maxValue) {
      if ($bestAlternative) {
        if ($maxValue < $value) {
          $value = $maxValue;
          $numberRowAlternative = $index;
        }
      } else {
        if ($maxValue > $value) {
          $value = $maxValue;
          $numberRowAlternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    $resultData["riskDataArray"] = $riskDataArray;
    return $resultData;
  }
  public function expectedValueCalculate($data, $c1, $c2, $n) {
    $numberRowAlternative = 0;
    $resultData = array();
    foreach ($data as $index => $row) {
      $pSum = 0;
      if ($index != 0) {
        for ($i = 0; $i < $index; $i++) {
          $pSum += $data[$i][0];
        }
      }
      array_push($data[$index], $pSum);
      array_push($data[$index], round($n * ($c1 * $pSum + $c2) / ($index + 1), 1));
    }
    $value = 0;
    foreach ($data as $index => $row) {
      if ($index != 0) {
        if (($data[$index - 1][2] >= $data[$index][2]) && ($data[$index + 1][2] >= $data[$index][2])) {
          $value = $data[$index][2];
          $numberRowAlternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    $resultData["newData"] = $data;
    return $resultData;
  }
  public function expectedValueDispersionCalculate($data, $c1, $c2, $n) {
    $numberRowAlternative = 0;
    $resultData = array();
    foreach ($data as $index => $row) {
      array_push($data[$index], pow($data[$index][0], 2));
      $pSum = 0;
      $pPowToSum = 0;
      if ($index != 0) {
        for ($i = 0; $i < $index; $i++) {
          $pSum += $data[$i][0];
        }
      }
      if ($index != 0) {
        for ($i = 0; $i < $index; $i++) {
          $pPowToSum += $data[$i][1];
        }
      }
      array_push($data[$index], $pSum);
      array_push($data[$index], $pPowToSum);
      array_push($data[$index], round($n / ($index + 1) * ($c1 * $data[$index][2] + $c2) + $n * pow($c1 / ($index + 1), 2) * ($data[$index][2] - $data[$index][3]), 2));
    }
    $value = $data[0][4];
    foreach ($data as $index => $row) {
      if ($row[4] < $value) {
        $value = $row[4];
        $numberRowAlternative = $index;
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    $resultData["newData"] = $data;
    return $resultData;
  }
  public function averageExpectedValueCalculate($data, $bestAlternative = true) {
    $numberRowAlternative = 0;
    $resultData = array();
    $casesCountArray = array();
    $averageExpectedValueArray = array();
    foreach ($data as $row) {
      $casesCount = 0;
      foreach ($row as $column) {
        $casesCount += $column[1];
      }
      array_push($casesCountArray, $casesCount);
    }
    foreach ($data as $index => $row) {
      $averageExpectedValue = 0;
      foreach ($row as $index2 => $column) {
        $averageExpectedValue += $column[0] * $column[1] / $casesCountArray[$index];
        $data[$index][$index2][2] = $column[1] / $casesCountArray[$index];
      }
      array_push($averageExpectedValueArray, $averageExpectedValue);
    }
    $value = $averageExpectedValueArray[0];
    foreach ($averageExpectedValueArray as $index => $expectedValue) {
      if ($bestAlternative) {
        if ($expectedValue > $value) {
          $value = $expectedValue;
          $numberRowAlternative = $index;
        }
      } else {
        if ($expectedValue < $value) {
          $value = $expectedValue;
          $numberRowAlternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["numberRowAlternative"] = $numberRowAlternative;
    $resultData["averageExpectedValueArray"] = $averageExpectedValueArray;
    $resultData["newData"] = $data;
    return $resultData;
  }
  public function limitLevelCalculate($i1, $i2, $a1, $a2) {
    $resultData = array();
    $expectedDeficit = array();
    $expectedSurpluses = array();
    $expectedDeficitLimit = round(log($i2) - ($a1 / $i2) - 1, 3);
    $expectedSurplusesLimit = round(log($i1) - ($a2 / $i2) - 1, 3);
    for ($i = $i1; $i <= $i2; $i++) {
      array_push($expectedDeficit, round(log($i) - ($i / $i2), 2));
      array_push($expectedSurpluses, round(log($i) - ($i / $i1), 2));
    }
    for ($i = 0; $i < count($expectedDeficit); $i++) {
      if ($expectedDeficit[$i] >= $expectedDeficitLimit && $expectedSurpluses[$i] >= $expectedSurplusesLimit) {
        $suitableStartIntervalIndex = $i;
        break;
      }
    }
    for ($i = count($expectedDeficit) - 1; $i >= 0; $i--) {
      if ($expectedDeficit[$i] >= $expectedDeficitLimit && $expectedSurpluses[$i] >= $expectedSurplusesLimit) {
        $suitableEndIntervalIndex = $i;
        break;
      }
    }
    $resultData["expectedDeficit"] = $expectedDeficit;
    $resultData["expectedSurpluses"] = $expectedSurpluses;
    $resultData["expectedDeficitLimit"] = $expectedDeficitLimit;
    $resultData["expectedSurplusesLimit"] = $expectedSurplusesLimit;
    $resultData["suitableStartIntervalIndex"] = $suitableStartIntervalIndex;
    $resultData["suitableEndIntervalIndex"] = $suitableEndIntervalIndex;
    return $resultData;
  }
}
?>

<?
namespace App\TPR;
class Lab3 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function summationOfRanksCalculate($data, $bestAlternative = true) {
    $resultData = array();
    $ranksArray = array();
    foreach ($data as $row) {
      foreach ($row as $index => $column) {
        if ($index != 0) {
          if (!isset($ranksArray[$column])) {
            $ranksArray[$column] = array();
          }
          array_push($ranksArray[$column], $index);
        }
      }
    }
    $value = array_sum(array_values($ranksArray)[0]);
    $alternative = array_keys($ranksArray)[0];
    foreach ($ranksArray as $index => $rank) {
      if ($bestAlternative) {
        if (array_sum($rank) < $value) {
          $value = array_sum($rank);
          $alternative = $index;
        }
      } else {
        if (array_sum($rank) > $value) {
          $value = array_sum($rank);
          $alternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["alternative"] = $alternative;
    $resultData["ranksArray"] = $ranksArray;
    return $resultData;
  }
}
?>

<?
namespace App\TPR;
class Lab4 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function analysisOfHierarchiesCalculate($data, $bestAlternative = true) {
    $resultData = array();
    $strategyArray = array();
    $strategySum = array();
    foreach ($data as $key => $row) {
      foreach ($row as $index => $column) {
        if ($index > 1) {
          if (!isset($strategyArray[$index - 2])) {
            $strategyArray[$index - 2] = array();
          }
          $additionElement = array();
          array_push($additionElement, $column / 100);
          array_push($additionElement, $data[$key][1] / 100);
          array_push($strategyArray[$index - 2], $additionElement);
        }
      }
    }
    $value = 0;
    $alternative = 0;
    foreach ($strategyArray as $index => $strategy) {
      $additionSum = 0;
      foreach ($strategy as $additionElement) {
        $additionSum += $additionElement[0] * $additionElement[1];
      }
      array_push($strategySum, $additionSum);
      if ($index == 0) {
        $value = $additionSum;
      }
      if ($bestAlternative) {
        if ($additionSum > $value) {
          $value = $additionSum;
          $alternative = $index;
        }
      } else {
        if ($additionSum < $value) {
          $value = $additionSum;
          $alternative = $index;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["alternative"] = $alternative;
    $resultData["strategyArray"] = $strategyArray;
    $resultData["strategySum"] = $strategySum;
    return $resultData;
  }
}
?>

<?
namespace App\TPR;
class Lab5 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function theoryOfGameCalculate($data, $coefficient, $maximizeParams, $bestAlternative = true) {
    $resultData = array();
    $efficiencyMatrix = array();
    $normalizeMatrix = array();
    $weightCoefficientMatrix = array();
    $valuesByParams = array();
    $minOrMaxvaluesByParams = array();
    $sumOfMinimizeParams = array();
    $sumOfMaximizeParams = array();
    $efficiencyMatrix = $data;
    foreach ($efficiencyMatrix as $key => $row) {
      $Ec = $row[count($row) - 1];
      foreach ($row as $index => $column) {
        if ($index != 0) {
          switch ($index) {
            case 1:
              $efficiencyMatrix[$key][$index] = 1 / ($efficiencyMatrix[$key][$index] * $Ec);
              break;
            case 2:
              $efficiencyMatrix[$key][$index] = $efficiencyMatrix[$key][$index] / $Ec;
              break;
            case 3:
              $efficiencyMatrix[$key][$index] = 1 / ($efficiencyMatrix[$key][$index] * $Ec);
              break;
            case 4:
              $efficiencyMatrix[$key][$index] = $efficiencyMatrix[$key][$index] / $Ec;
              break;
            case 5:
              break;
          }
        }
      }
    }
    foreach ($efficiencyMatrix as $key => $row) {
      if ($key == 0) {
        for ($i = 0; $i < count($row) - 1; $i++) {
          array_push($valuesByParams, array());
        }
      }
      foreach ($row as $index => $column) {
        if ($index != 0) {
          array_push($valuesByParams[$index - 1], $column);
        }
      }
    }
    foreach ($valuesByParams as $key => $row) {
      $minOrMaxValues = $row[0];
      foreach ($row as $index => $column) {
        if ($maximizeParams[$key]) {
          if ($column > $minOrMaxValues)
            $minOrMaxValues = $column;
        } else {
          if ($column < $minOrMaxValues)
            $minOrMaxValues = $column;
        }
      }
      array_push($minOrMaxvaluesByParams, $minOrMaxValues);
    }
    $normalizeMatrix = $efficiencyMatrix;
    foreach ($normalizeMatrix as $key => $row) {
      foreach ($row as $index => $column) {
        if ($index != 0) {
          if ($maximizeParams[$key]) {
            $normalizeMatrix[$key][$index] /= $minOrMaxvaluesByParams[$index - 1];
          } else {
            $normalizeMatrix[$key][$index] = $minOrMaxvaluesByParams[$index - 1] / $efficiencyMatrix[$key][$index];
          }
        }
      }
    }
    $weightCoefficientMatrix = $normalizeMatrix;
    foreach ($weightCoefficientMatrix as $key => $row) {
      foreach ($row as $index => $column) {
        if ($index != 0) {
          $weightCoefficientMatrix[$key][$index] = $weightCoefficientMatrix[$key][$index] * $coefficient[$index - 1];
        }
      }
    }
    foreach ($weightCoefficientMatrix as $key => $row) {
      $sumOfMax = 0;
      $sumOfMin = 0;
      foreach ($row as $index => $column) {
        if ($index != 0) {
          if ($maximizeParams[$index - 1]) {
            $sumOfMax += $column;
          } else {
            $sumOfMin += $column;
          }
        }
      }
      array_push($sumOfMaximizeParams, $sumOfMax);
      array_push($sumOfMinimizeParams, $sumOfMin);
    }
    $value = $sumOfMaximizeParams[0] / $sumOfMinimizeParams[0];
    $alternative = 0;
    for ($i = 0; $i < count($weightCoefficientMatrix); $i++) {
      if ($bestAlternative) {
        if ($sumOfMaximizeParams[$i] / $sumOfMinimizeParams[$i] > $value) {
          $value = $sumOfMaximizeParams[$i] / $sumOfMinimizeParams[$i];
          $alternative = $i;
        }
      } else {
        if ($sumOfMaximizeParams[$i] / $sumOfMinimizeParams[$i] < $value) {
          $value = $sumOfMaximizeParams[$i] / $sumOfMinimizeParams[$i];
          $alternative = $i;
        }
      }
    }
    $resultData["value"] = $value;
    $resultData["alternative"] = $alternative;
    $resultData["efficiencyMatrix"] = $efficiencyMatrix;
    $resultData["normalizeMatrix"] = $normalizeMatrix;
    $resultData["weightCoefficientMatrix"] = $weightCoefficientMatrix;
    $resultData["minOrMaxvaluesByParams"] = $minOrMaxvaluesByParams;
    $resultData["sumOfMinimizeParams"] = $sumOfMinimizeParams;
    $resultData["sumOfMaximizeParams"] = $sumOfMaximizeParams;
    return $resultData;
  }
}
?>

<?
namespace App\TPR;
class Lab6 {
  public $tprSpreadsheet = array();
  public function __construct($data) {
    $this->tprSpreadsheet = $data;
  }
  public function prioritySettingCalculate($data) {
    $resultData = array();
    $adjacencyMatrix = array();
    $sumByRow = array();
    $p = array();
    foreach ($data as $index => $column) {
      $adjacencyMatrix[$index] = array();
      foreach ($data as $elem) {
        if ($column > $elem) {
          array_push($adjacencyMatrix[$index], 2);
        } else if ($column < $elem) {
          array_push($adjacencyMatrix[$index], 0);
        } else if ($column == $elem) {
          array_push($adjacencyMatrix[$index], 1);
        }
      }
    }
    foreach ($adjacencyMatrix as $row) {
      array_push($sumByRow, array_sum($row));
    }
    $p[0] = array();
    $sum = array_sum($sumByRow);
    foreach ($sumByRow as $row) {
      array_push($p[0], $row / $sum);
    }
    $p[1] = array();
    foreach ($adjacencyMatrix as $row) {
      $s = 0;
      foreach ($row as $index => $column) {
        $s += $column * $sumByRow[$index];
      }
      array_push($p[1], $s);
    }
    $p[2] = array();
    $sum2 = array_sum($p[1]);
    foreach ($p[1] as $row) {
      array_push($p[2], $row / $sum2);
    }
    $resultData["adjacencyMatrix"] = $adjacencyMatrix;
    $resultData["sumByRow"] = $sumByRow;
    $resultData["p"] = $p;
    return $resultData;
  }
}
?>
