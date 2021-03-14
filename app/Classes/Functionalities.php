<?php

namespace App\Classes;

class Functionalities
{

    /**
     * Função que pega o dado e transforma numa HASH para aumento da segurança.
     */
    public function encript($value)
    {
        return bin2hex(openssl_encrypt($value,'aes-256-cbc','VJMoYK71TOj8Byo6dGiIavd4Dhr8uQgY',OPENSSL_RAW_DATA, '2vwdfinGEwqj6KzA'));
    }

    /**
     * Função que pega o Hash e transforma no dado original para aumento da segurança.
     */
    public function decript($hash)
    {
        // Testa se a hash é válida
        if(strlen($hash)%2 != 0){
            return null;
        }

        return openssl_decrypt(hex2bin($hash),'aes-256-cbc','VJMoYK71TOj8Byo6dGiIavd4Dhr8uQgY',OPENSSL_RAW_DATA,'2vwdfinGEwqj6KzA');

    }
}
