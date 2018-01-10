
<?php
class ShoppingCart {
    private $items = [];
    private $test = [];

    public function addItem($item, $num, $size) {
        if (!isset($this->items[$item])) {
            $this->items[$item] = 0;
            $this->test[$item] = $size;
        }
        $this->items[$item] += $num;
    }

    public function removeItem($item, $num) {
        if (isset($this->items[$item])) {
            $this->items[$item] -= $num;
            if ($this->items[$item] <= 0) {
                unset($this->items[$item]);
            }
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function isEmpty() {
        return count($this->items) == 0;
    }

    public function render() {
        if ($this->isEmpty()) {
            echo "<div class=\"cart empty\">[Empty Cart]</div>";
        }
        else {
            echo "<table border=1>";
            echo "<tr><td><p>Artikel</p></td><td><p>Anzahl</p></td><td><p>Grösse</p></td><td><p>Preis</p></td></tr>";
            $sum = 0;
            foreach ($this->items as $item=>$num){
                include "textArrays.php";
                $price = $num * Product::getItemPrice($this->test[$item],$item);
                //$price = $num * $price[33][$item];
                $size = $this->test[$item];
                echo "<tr><td><p>$item</p></td><td><p>$num</p></td><td><p>$size cl</p></td><td><p>$price</p></td></tr>";
                $sum += $price;
            }

            echo "<tr><td colspan=\"3\"><p>Gesamt</p></td><td><p>$sum</p></td></tr>";
            echo "</table>";
        }
    }
}
?>
