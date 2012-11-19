<?php 

class Solvedora {


    /*
    * @parameter int a. Primeiro x escolhido
    * @parameter int b. Segundo x escolhido
    * @parameter int epsilon. Erro tolerado
    *
    * @return double solucao. A solucão obtida entre os pontos a e b.
    */
    public static function solvaPorFPM($a, $b, $epsilon, $equacao)
    {
        $fa = self::$equacao($a);
        $fb = self::$equacao($b);
        $aux = $fa;
        $erro = 1 + $epsilon;
        while($erro > $epsilon)
        {
            $xx = $a - ($fa * ($b-$a)) / ($fb - $fa);
            $fx = self::$equacao($xx);
            if( $fx == 0)
            {
                $erro = 0;
            }
            $prod = $fa * $fx;
            if ($prod < 0)
            {
                $b = $xx;
                $fb = $fx;
                $prod2 = $fx * $aux;
                if ( $prod2 > 0 )
                {
                    $fa = $fa/2;    
                }
            } else {
                $a = $xx;
                $fa = $fx;
                $prod2 = $fx * $aux;
                if ( $prod2 > 0 )
                {
                    $fb = $fb/2;    
                }
               
            }
            $erro = abs($b-$a);
            $aux = $fx;
        }
        return $xx;
    }
    /*
    * Método que calcula f(x) = e^-x - lnx
    */
    public function calculaFdeXEq1($x) 
    {
        $fx = (exp(-$x)) - log($x);
        return $fx;
    }
    
    /*
    * Método que calcula f(x) = 3x + senx - e^x
    */
    public function calculaFdeXEq2($x) 
    {
        $fx = (3 * $x) + sin($x) - exp($x);
        return $fx;
    }
    
    /*
    * Método que calcula f(x) = x^3 - 2x^2 - 5 
    */
    public function calculaFdeXEq3($x) 
    {
        $fx = ( $x^3 ) - ( 2 * $x^2 ) - 5;
        return $fx;
    }

}

function main() {
    $solucaoPorFPM = Solvedora::solvaPorFPM(1, 2, 0.0001,'calculaFdeXEq1');
    echo "Solução de f(x) = e^-x - lnx por FPM = $solucaoPorFPM \n";
    
    $solucaoPorFPM = Solvedora::solvaPorFPM(0, 1, 0.0001,'calculaFdeXEq2');
    echo "Solução de f(x) = 3x + senx - e^x por FPM = $solucaoPorFPM \n";
    
    $solucaoPorFPM = Solvedora::solvaPorFPM(0, 1, 0.0001,'calculaFdeXEq3');
    echo "Solução de f(x) = x^3 - 2x^2 - 5 por FPM = $solucaoPorFPM \n";
}

main();
?>
