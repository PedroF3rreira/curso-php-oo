<?php 
interface RepositoryInterface
{
	public function load(Criteria $criteria);
	public function delete(Criteria $criteria);
	public function count(Criteria $criteria);
}