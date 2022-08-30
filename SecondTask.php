<?php

class ExcelColumnHandler
{
    private $alphabet;

    private $lastCellNumber = 18278;

    public function __construct()
    {
        $this->alphabet = explode(' ', 'A B C D E F G H I J K L M N O P Q R S T U V W X Y Z');
    }

    public function getColumnByNumber(int $number)
    {
        if ($number > $this->lastCellNumber) {
            return 'Последний номер ячейки ' . $this->lastCellNumber;
        }

        $cellLetters = $this->getAlphabet();
        $cells = $this->getAlphabet();

        for ($i = 0; $i < 2; $i++) {
            $cellLetters = $this->generateExcelColumns($cellLetters, $this->getAlphabet());
            $cells = array_merge($cells, $cellLetters);

            $index = $number - 1;
            if (key_exists($index, $cells)) {
                return $cells[$index];
            }
        }
    }

    private function getAlphabet(): array
    {
        return $this->alphabet;
    }

    private function generateExcelColumns(array $lettersForCombination, array $baseLetters): array
    {
        $allColumns = [];
        foreach ($baseLetters as $index => $letter) {

            foreach ($lettersForCombination as $nestedIndex => $nestedLetter) {
                $allColumns[] = $letter . $nestedLetter;
            }
        }

        return $allColumns;
    }
}

$excelHandler = new ExcelColumnHandler();
echo $excelHandler->getColumnByNumber(3);