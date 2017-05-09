<?php
  include ('../menu/index.head.tpl.php');
?>
  <link rel="stylesheet" href="../estilo/tabela.css">
<?php
  include ('../menu/index.body.tpl.php');
?>
<section>
    <h1>Listagem de Categorias</h1>
    <h3><a href="?acao=incluir">Adicionar categoria</a></h3>
</section>

<!-- Gerando uma tabela com as informações sobre Categorias do Banco -->
<div class="container-table">
  <div class="table">
    <div class="row header">
      <div class="cell-categoria"><p> Categorias </p></div>
      <div class="cell-categoria"><p> Descrições </p></div>
      <div class="cell-categoria"></div>
      <div class="cell-categoria"></div>
    </div>
  <?php
  foreach ($categorias as $categoria) {
    echo "
          <div class='row'>
            <div class='cell-categoria'><p>{$categoria['nomeCategoria']}</p></div>
            <div class='cell-categoria'><p>{$categoria['descCategoria']}</p></div>
            <div class='cell-categoria'><a href='?acao=editar&id={$_SESSION['tipoPerfil']}'>Editar</a></div>
            <div class='cell-categoria'><a href='?acao=excluir&id={$_SESSION['tipoPerfil']}'>Excluir</a></div>
          </div>
         ";
       }
  ?>
  </div> <!-- Fim table -->
</div> <!-- Fim container-table -->

<?php
  include ('../menu/index.head.tpl.php');
?>