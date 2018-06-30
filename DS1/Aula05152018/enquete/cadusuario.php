<?php

require "funcoes.php";
require "config.php";
acesso();
cabecalho("Cadastro de usuários");

?>
<form action="gravausuario.php" name="form1" method="post" class+"form-inline">
<p>Nome:
<input type="text" size="50" autofocus name="nome" class="form-control"/>
</p>
<p>Email:
<input type="text" size="50" name="email" class="form-control"/>
</p>
<p>Sehna:
<input type="password" size="50" name="senha" class="form-control"/>
</p>
<p>Confirmar senha : 
<input type="password" size="50" name="senha2" class="form-control"/>
</p>
<p>
<input type="submit" value="Gravar" class="btn btn-primary" />
<input type="reset" value="Limpar" class="btn btn-primary" />
</p>
</form>

<?php
echo '<table width="100%" border>
<tr>
<td><b>Codigo</b></td>
<td><b>Nome</b></td>
<td><b>Email</b></td>
<td><b>Opções</b></td>
</tr>
';

$consulta = $pdo->prepare("select * from usuarios");
$consulta->execute();

while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
    <td>$row[codigo]</td>
    <td>$row[nome]</td>
    <td>$row[email]</td>
    <td><a href=\"alterarusuarios.php?codigo=$row[codigo]\" class=\"btn btn-success btn-xs\">Alterar</a>
    <a href=\"excluirusuarios.php?codigo=$row[codigo]\" class=\"btn btn-danger btn-xs\" onclick=\"return confirm('Confirma a exclusão do registro?')\">Excluir</a></td>
    ";
};

echo '</table>';

rodape();
?>
