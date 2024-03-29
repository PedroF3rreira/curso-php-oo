<?php
namespace Livro\Widgets\Dialog;

use Livro\Control\Action;
use Livro\Widgets\Base\Element;

/**
 * Exibe perguntas ao usuário
 * @author Pablo Dall'Oglio
 */
class Question
{
    /**
     * Instancia o questionamento
     * @param $message = pergunta ao usuário
     * @param $action_yes = ação para resposta positiva
     * @param $action_no = ação para resposta negativa
     */
    function __construct($message, Action $action_yes, Action $action_no = NULL)
    {
        $div = new Element('div');
        $div->class = 'alert alert-warning question mx-auto container';
        
        // converte os nomes de métodos em URL's
        $url_yes = $action_yes->serialize();
        
        $link_yes = new Element('a');
        $link_yes->href = $url_yes;
        $link_yes->class = 'btn btn-outline-dark';
        $link_yes->style = '';
        $link_yes->add('Sim');
        
        //$message .= '&nbsp;' . $link_yes;
        if ($action_no)
        {
            $url_no = $action_no->serialize();
            
            $link_no = new Element('a');
            $link_no->href = $url_no;
            $link_no->class = 'btn btn-outline-primary ml-2';
            $link_no->add('Não');
            
            //$message .= $link_no;
        }
        $p = new Element('p');
        $p->class = 'col-10 mr-4';
        $p->add($message);
        
        $row = new Element('div');
        $row->class = 'row';

        $row->add($p);
        $row->add($link_yes);
        $row->add($link_no);

        $div->add($row);
        $div->show();
    }
}
