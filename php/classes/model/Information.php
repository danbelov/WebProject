<?php
/**
 * Created by PhpStorm.
 * User: redsquare
 * Date: 14.12.2017
 * Time: 19:15
 */

class Information
{
    public function getMyCartInfo(){

    }

    public function getContactsInfo(){

    }

    public function getMenuInfo()
    {
        $sql= "SELECT name,qtyInASet,category,price FROM products";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        echo '<table border="1">';
        echo '<tr><th>Our Menu</th></tr>';
        echo '<tr><th>Type</th><th>Contents</th><th>Price</th></tr>';
        foreach( $result as $productsinfo )
        {
            echo '<tr>';
            foreach( $productsinfo as $key )
            {
                echo '<td>'.$key.'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}