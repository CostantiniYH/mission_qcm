<?php
namespace App\Views\Components;

class Form {    
    private $inputs = [];
    private $buttons = [];

    public function Input($name, $class, $type, $placeholder, $value) {
        $this->inputs[] = '
            <input 
            name="'.$name.'"
            class="'.$class.'"
            type="'.$type.'"
            value="'.$value.'"
            placeholder="'.$placeholder.'"
            />
        ';
    }
        
    public function Submit($name, $value, $class) {
        $this->buttons[] = '
            <button 
            type="submit" 
            name="'.$name.'"
            class="'.$class.'"                 
            >'.$value.'</button>
        ';
    }
    public function Render($action, $method, $class, $class_titre, $titre) {
        echo '<form class="'.$class.'" action="'.$action.'" method="'.$method.'">';
            echo '<h1 class="'.$class_titre.'">'.$titre.'</h1>';
        foreach ($this->inputs as $in) {
            echo $in;
        }

        foreach ($this->buttons as $btn) {
            echo $btn;
        }

        echo '</form>';
    }
}

?>