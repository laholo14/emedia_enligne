<?php

class Cryptage
{

    protected $binaire;
    protected $cle='ACER14HPASUSFUJI' ;

    public function __construct()
    {
        $this->binaire;
    }

    public function getBinaire()
    {
        return $this->binaire;
    }

    public function setBinaire($binaire)
    {
        $this->binaire = $binaire;
    }



    public function crpt14($message)
    {
        $key_object = new Binary();
        $key = $this->cle;
        $bin_key = $key_object->Bin_128($key);

        $mdp = new Binary();
        $passe = $message;
        $bin_mdp = $mdp->Bin_128($passe);

        $bin_first_128 = '';
        for ($i = 0; $i < 128; $i++) 
        {
            $bit_mdp = intval(substr($bin_mdp, $i, 1));
            $bit_key = intval(substr($bin_key, $i, 1));
            $xor = $bit_mdp ^ $bit_key;
            $bin_first_128 .= $xor;
        }

        $bin_mdp_first_64 = substr($bin_first_128, 0, 64);
        $bin_mdp_second_64 = substr($bin_first_128, 64, 64);
        $bin_key_first_64 = substr($bin_key, 0, 64);
        $bin_key_second_64 = substr($bin_key, 64, 64);

        $bin_first_64 = '';
        $bin_second_64 = '';
        for ($i = 0; $i < 64; $i++) 
        {
            $bit_mdp_first = intval(substr($bin_mdp_first_64, $i, 1));
            $bit_mdp_second = intval(substr($bin_mdp_second_64, $i, 1));
            $bit_key_second = intval(substr($bin_key_second_64, $i, 1));
            $bit_key_first = intval(substr($bin_key_first_64, $i, 1));
            $xor_first = $bit_mdp_first ^ $bit_key_second;
            $xor_second = $bit_mdp_second ^ $bit_key_first;
            $bin_first_64 .= $xor_first;
            $bin_second_64 .= $xor_second;
        }

        return  $bin_second_64 . $bin_first_64;
        
    }
    
}
