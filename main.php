<?php
  // Присоздании объекта автоматически добавляется 
  // указанное количество яблонь и груш методом plant вызывыемым
  // в конструкторе класса
  // метод plant вызывает метод combine для подсчета колличества плодов кждого сорта
  // а так же их веса
  // при отдельном вызове метода plant для добавления деревьев
  // снова вызывется метод combine внутри метода plant для нового расчета
  class Garden {
    public $apple_tree = array();
    public $pear_tree = array();
    public $apple_count;
    public $pear_count;
    public $apple_weight;
    public $pear_weight;

    function __construct() {
      $this->plant(10,15);
    }

    function plant($a,$p) {

      if ($a <= 0) $a = 1;
      if ($p <= 0) $p = 1;

      $start = COUNT($this->apple_tree)+1;
      $finish = COUNT($this->apple_tree)+$a;

      for ($i=$start; $i<=$finish; $i++) {
        for ($y=0; $y < rand(40,50); $y++)
          $this->apple_tree[$i][] = rand(150,180);
      }

      $start = COUNT($this->pear_tree)+1;
      $finish = COUNT($this->pear_tree)+$p;

      for ($i=$start; $i<=$finish; $i++) {
        for ($y=0; $y < rand(0,20); $y++)
          $this->pear_tree[$i][] = rand(130,170);
      }

      $this->combine();
    }

      function combine() {
      foreach ($this->apple_tree as $tree) {
        $this->apple_count = $this->apple_count + COUNT($tree);
        foreach ($tree as $fetus)
          $this->apple_weight = $this->apple_weight + $fetus;
      }

      foreach ($this->pear_tree as $tree) {
        $this->pear_count = $this->pear_count + COUNT($tree);
        foreach ($tree as $fetus)
          $this->pear_weight = $this->pear_weight + $fetus;
      }

      echo "Apple count: ".$this->apple_count." Apple weight: ".$this->apple_weight;
      echo "<br>";
      echo "Pear count: ".$this->pear_count." Pear weight: ".$this->pear_weight;
      echo "<br>";
    }

  }

  $garden = new Garden;
  $garden->plant(20,50);
?>
