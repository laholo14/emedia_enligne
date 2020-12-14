
<?php

class Binary
{

    public function Bin_128($chaine)
    {

        $longueur_txt = strlen($chaine);
        $bin_8_bit = '';
        for ($i = 0; $i < $longueur_txt; $i++) {

            $caractere = substr($chaine, $i, 1);
            $tab[$i] = ord($caractere);
            $bin = decbin($tab[$i]);
            $size_bin = strlen($bin);
            $diff_bin = 8 - $size_bin;
            for ($j = 0; $j < $diff_bin; $j++) {
                $bin = 0 . $bin;
            }
            $bin_8_bit .= $bin;
        }     
        $size_bin_8_bit = strlen($bin_8_bit);
        $diff_bin_128_bit = 128 - $size_bin_8_bit;
        $zero = '';
        for ($i = 0; $i < $diff_bin_128_bit; $i++) {
            $zero .= 0;
        }

        $binary = $zero . $bin_8_bit;

        return $binary;
    }
}

?>