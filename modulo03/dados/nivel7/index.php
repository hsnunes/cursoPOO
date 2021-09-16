<?php





$classe = $_REQUEST['class'];
$metodo = ($_REQUEST['method']) ?? null;

if ( class_exists($classe) )
{
    /**
     * Instancia a classe passada para execução
     */
    $pagina = new $classe($_REQUEST);

    if ( !empty($method) AND method_exists($classe, $method) )
    {
        /**
         * alimenta o atributo metodo da class com o REQUEST
         */
        $pagina->$metodo($_REQUEST);
    }
    $pagina->show();
}