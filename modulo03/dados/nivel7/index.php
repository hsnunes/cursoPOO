<?php

/**
 * Ativa o carregamento automático de Classes, que estiverem no mesmo diretorio
 * Ou que esteja configuradas em outros diretorios
 */
spl_autoload_register( function($class) {
    if ( file_exists( $class . ".php") )
    {
        require $class . ".php";
    }
});

$classe = $_REQUEST['class'];
$metodo = ($_REQUEST['method']) ?? null;

if ( class_exists($classe) )
{
    /**
     * Instancia a classe passada para execução
     */
    $pagina = new $classe($_REQUEST);

    if ( !empty($metodo) AND method_exists($classe, $metodo) )
    {
        /**
         * alimenta o atributo metodo da class com o REQUEST
         */
        $pagina->$metodo($_REQUEST);
    }
    $pagina->show();
}