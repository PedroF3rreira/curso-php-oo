<?php 

$stack = new SplStack();

$stack->push('arroz');
$stack->push('feijao');
$stack->push('macarrão');

echo $stack->count();

//exclui ultimo elemento adicionado
echo $stack->pop();