<?php
class ConstructorClass {
    private $data;
    public function __construct(array $data) {
        $this->data = $data;
    }
    public function bubbleSort() {
        $size = count($this->data);
        for ($i = 0; $i < $size - 1; $i++) {
            for ($j = 0; $j < $size - $i - 1; $j++) {
                if ($this->data[$j] > $this->data[$j + 1]) {
                    $temp = $this->data[$j];
                    $this->data[$j] = $this->data[$j + 1];
                    $this->data[$j + 1] = $temp;
                }
            }
        }
    }
    public function getMedian() {
        $size = count($this->data);
        $mid = (int) ($size / 2);

        if ($size % 2 == 0) {
            return ($this->data[$mid - 1] + $this->data[$mid]) / 2;
        } else {
            return $this->data[$mid];
        }
    }

    public function getLargestValue() {
        return end($this->data);
    }
}

class AnotherClass {
    private $constructorClass;

    public function __construct(array $data) {
        $this->constructorClass = new ConstructorClass($data);
    }

    public function getMedian() {
        $this->constructorClass->bubbleSort();
        return $this->constructorClass->getMedian();
    }

    public function getLargestValue() {
        $this->constructorClass->bubbleSort();
        return $this->constructorClass->getLargestValue();
    }
}
$data = [11, 45, 44, 32, 86, 95, 34, 22, 1, 2];
$anotherClass = new AnotherClass($data);
echo "Data: " . implode(', ', $data) . "<br>";
echo "Median: " . $anotherClass->getMedian() . "<br>";
echo "Largest Value: " . $anotherClass->getLargestValue() . "<br>";
?>
