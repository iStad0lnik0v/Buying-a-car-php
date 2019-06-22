

function nbMonths($startPriceOld, $startPriceNew, $savingPerMonth, 
  $percentLossByMonth) {
  $result = [];

  if($startPriceOld > $startPriceNew) {
    $price = $startPriceNew - $startPriceOld;
    if ($price < 0)
      {
          $price=abs($price);
        }
    array_push($result, 0, round($price));
    return $result;
  }
    $months = 0;
  $totalSaving = 0;
  $corrPriceNew = $startPriceNew;
  $corrPriceOld = $startPriceOld;
  $lossPerc = $percentLossByMonth; 
while (($totall = $totalSaving + $corrPriceOld) < $corrPriceNew) {
    $months += 1;
if ($months % 2 == 0) {
      $lossPerc += 0.5; 
    }
    $totalSaving += $savingPerMonth;
    $corrPriceOld -= $corrPriceOld * ($lossPerc / 100);
    $corrPriceNew -= $corrPriceNew * ($lossPerc / 100);
  }
    $save = $totalSaving + $corrPriceOld - $corrPriceNew;
    array_push($result, $months, round($save));
return $result;
}