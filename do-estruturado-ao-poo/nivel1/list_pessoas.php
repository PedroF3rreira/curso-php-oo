<?php 

$conn = mysqli_connect('localhost', 'root', '', 'livro');

$sql = "SELECT *, pessoas.nome as pessoa FROM pessoas INNER JOIN cidades ON pessoas.id_cidade=cidades.id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	echo "
		<tr>
			<td><a href='pessoa_editar.php?id={$row['id']}'>editar</a></td>
			<td> <a href='pessoa_excluir.php?id={$row['id']}'>excluir</a></td>
			<td>{$row['id']}</td>
			<td>{$row['pessoa']}</td>
			<td>{$row['endereco']}</td>
			<td>{$row['bairro']}</td>
			<td>{$row['nome']}</td>
			<td>{$row['telefone']}</td>
			<td>{$row['email']}</td>
		</tr>
	";
}