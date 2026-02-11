<?php
namespace App\Views\Components;

class Base {
    public function Title($title) {
        return "<title>".$title."</title>";
    }

    public function Liste($array) {       
        foreach ($array as $a) {
            echo "<h1>".$a."</h1>";
          }          
    }

    public function Table($header, $data) {
        echo "<table class='gridtab'><tr>";

        foreach ($header as $a) {
            echo "<th class='case'>".$a."</th>";
        }

        echo "</tr>";

        foreach ($data as $a) {
            echo "<tr>";
            foreach ($a as $d) {
                echo "<td class='case'>".$d."</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }

}
?>