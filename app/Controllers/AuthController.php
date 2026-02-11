<?php
namespace App\Controllers\Auth;
use App\Views\Components\Base;
use App\Views\Components\Form;

class RegisterController {
    public function index() {
        $class = new Base();
        echo $class->Title(title: 'Inscription');  

        $register = new Form();
        $register->Input('firstname','input','text', 'Entre votre Prénom', '');
        $register->Input('lastname','input','text', 'Entrer votre Nom', '');
        $register->Input('email','input','text', 'Saisissez votre Email', '');
        $register->Input('psw','input','text', 'Créez votre mot de passe', '');
        $register->Input('pswconfirm','input','text', 'Confirmez votre mot de passe', '');
        $register->Input('valider','','submit', 'Valider', 'valider');
        $register->Submit('submit', 'Envoyer', '');
        $register->Render('profil', 'post', '', '', 'Inscription');
    }
}