<?php

declare(strict_types=1);

function getKeys(array $array): string
{
  $keys = array_keys($array[0]);
  return implode(", ", $keys);
}

function getReferences(array $array): string
{
  $keys = array_keys($array[0]);

  foreach ($keys as $key) {
    $key = ':' . $key;
    $newKeys[] = $key;
  }

  return implode(", ", $newKeys);
}

$file = fopen("employee_list_flakt_ab.csv", "r");
$CSVarray = [];
$newArray = [];
while (!feof($file)) {

  array_push($CSVarray, fgetcsv($file));
}

array_pop($CSVarray);

foreach ($CSVarray as $array) {
  $newArray[] = array_combine($CSVarray[0], $array);
}

array_shift($newArray);

$keys = getKeys($newArray);

$refs = getReferences($newArray);

$dsn = 'sqlite:' . __DIR__ . '/Murder.sqlite';

$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $pdo = new PDO($dsn, '', '', $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "INSERT INTO employee_list_flakt_ab ($keys) VALUES ($refs)";

foreach ($newArray as $data) {
  $statement = $pdo->prepare($sql);
  $statement->execute($data);
}
