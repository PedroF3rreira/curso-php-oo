<?php 
/**
 * Este padão data mapper é responsavel por salvar no banco de dados um pacote de 
 * objetos no casa o objeto venda e seus itens que são instancias da classe produto
 * 
 */
class VendaMapper
{
	private static $conn;

	public static function setConnection(PDO $conn)
	{
		self::$conn = $conn;
	}

	public static function save(Venda $venda)
	{
		$data = date('Y-m-d');
		$sql = "INSERT INTO venda (data_venda) VALUES ('{$data}')";
		echo $sql."<br>";
		
		self::$conn->query($sql);
		
		$venda->setId(self::$conn->lastInsertId());

		foreach($venda->getItens() as $item)
		{
			$quantidade = $item[0];
			$produto    = $item[1];

			$sql = "INSERT INTO item_venda 
			(venda_id, produto_id, preco, quantidade) 
				VALUES 
			('{$venda->getId()}', '{$produto->id}', '{$produto->preco}', '{$quantidade}')";

			self::$conn->query($sql);
		}
	}
}