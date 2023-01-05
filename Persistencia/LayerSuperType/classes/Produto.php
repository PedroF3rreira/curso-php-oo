<?php 
/**
 * classe padão active record
 * pros: com apenas um arquivo somos capazes de realizar um crud nas entidades do sistema
 * contras: feri o principio de responsabilidade unico do S.O.L.I a classe e responsavel por
 * representar um entidade e suas regras de negocio e tambêm por acessar banco de dados
 * **/
class Produto extends Record
{
	const TABLENAME = 'produtos';
}