<?php

require __DIR__.'/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!isset($argv[1])) {
	die('Fichero no recibido');
}

if (!file_exists($argv[1])) {
	die('Fichero no encontrado: "'.$argv[1].'"');
}

$worksheet = IOFactory::load($argv[1])->getActiveSheet();

$array = $languages = [];
$highestColumn = $worksheet->getHighestColumn();
$highestRow = $worksheet->getHighestRow();

for ($row = 1; $row <= $highestRow; $row++) {
	$key = null;

	for ($column = 'A', $i = -1; $column != $highestColumn; $column++, $i++) {
		$cell = $worksheet->getCell($column.$row);
		$value = trim($cell->getValue());

		if ($value === '') continue;

		if ($row === 1) {
			if ($column === 'A') continue;

			$languages[$i] = $value;
			$array[$value] = [];
			continue;
		}

		if ($column === 'A') {
			$key = $value;
			continue;
		}

		if (!$key) continue;

		$array[$languages[$i]][$key] = $value;
	} // for ($column)
} // for ($row)

$nameJson = isset($argv[2]) ? $argv[2] : 'translations.json';
file_put_contents($nameJson, json_encode($array, JSON_PRETTY_PRINT));

die('Fichero JSON generado correctamente: "'.$nameJson.'"');