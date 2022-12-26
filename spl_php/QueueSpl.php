<?php 

$queue = new SplQueue();

//adiciona elemento a fila
$queue->enqueue('email1');
$queue->enqueue('email2');
$queue->enqueue('email3');

echo "Elementos da fila";

foreach($queue as $value)
{
	echo "<br> " . $value . "";
}

echo "<br>Quantidade de Elementos: ". $queue->count();

//deleta elemento da fila
echo "<br> Elemento deletado: ".$queue->dequeue();

echo "<br>Quantidade de Elementos: ". $queue->count();

//deleta elemento da fila
echo "<br> Elemento deletado: ".$queue->dequeue();

echo "<br>Quantidade de Elementos: ". $queue->count();

//deleta elemento da fila
echo "<br> Elemento deletado: ".$queue->dequeue();