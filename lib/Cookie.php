<?php
namespace lib;

class Cookie 
{

    private $time;

    public function __construct($time = 1) 
    {
        $this->time = time() + $time*86400;
    }

    public function setCookieUser($user) 
    {
        $this->setCookie('login', $user->getLogin());
        $this->setCookie('senha', $user->getSenha());
        $this->setCookie('nome', $user->getNome());
    }

    public function setCookieUserJson($user) 
    {
        $this->setCookie('login', json_encode($user));
    }

    public function getCookieUser() 
    {
        if ($this->isCookieExist()) {
            $nome = filter_input(INPUT_COOKIE, 'nome');
            $login = filter_input(INPUT_COOKIE, 'login');
            $senha = filter_input(INPUT_COOKIE, 'senha');
            if ($nome && $login && $senha)
                return new Usuario($login,$senha,$nome);
            else
                return false;
        }else {
            return false;
        }
    }

    public function getCookieUserJson() 
    {
        if ($this->isCookieExist()) {
            $login = filter_input(INPUT_COOKIE, 'login');
            if ($login) {
                $user = json_decode($login);
                if (is_a($user, 'Usuario')) {
                    return $user;
                }
                else{
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setCookie($nome, $valor) 
    {
        setcookie($nome, $valor, $this->time,'/');
    }

    public function getCookie($nome) 
    {
        return filter_input(INPUT_COOKIE, $nome);
    }

    public function isCookieExist($login = 'login') 
    {
         return (filter_input(INPUT_COOKIE,$login))?true:false; 
    }

    public function destroyCookie() 
    {        
        setcookie('login', null, -1,'/');
        setcookie('senha', null, -1,'/');
        setcookie('nome', null, -1,'/');
    }
}
