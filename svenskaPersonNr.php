<?php

declare(strict_types=1);

for ($i = 0; $i < 500; $i++) {

  $year = (string)rand(1920, 2020);

  $month = (string)rand(1, 12);

  if (strlen($month) < 2) {
    $month = "0" . $month;
  }

  $day = (string)rand(1, 29);

  if (strlen($day) < 2) {
    $day = "0" . $day;
  }

  $last = (string)rand(1000, 9999);

  $numbers[] = $year . $month . $day . $last;
}

$uniquePersonalNumbers = array_unique($numbers);

print_r($uniquePersonalNumbers);

$file = fopen("person_nummer.sql", "w");

$i = 0;

foreach ($uniquePersonalNumbers as $number) {

  $i++;

  $sql = "UPDATE missing_people SET social_security_number = $number WHERE id = $i;\n";

  fwrite($file, $sql);
}

fclose($file);
