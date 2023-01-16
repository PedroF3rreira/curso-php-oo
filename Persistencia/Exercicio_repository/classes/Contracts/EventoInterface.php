<?php 
interface EventoInterface
{
	public function load(Criteria $criteria);
	public function delete(Criteria $criteria);
	public function count(Criteria $criteria);
}