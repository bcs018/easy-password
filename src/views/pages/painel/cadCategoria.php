<?php
$render('headerPainel', ['title' => 'easy password - Painel de controle']);
?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h2 class="mb"><i class="fa fa-angle-right"></i> Cadastro de categorias</h2>
                    <form class="form-horizontal style-form" method="post" action="<?php echo BASE_URI; ?>/inserir-categoria">
                        <div class="form-group">
                            <label class="form-label">Nome da categoria</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomeCat" class="form-control">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                            </div>
                        </div>
                    </form>

                    <label class="form-label">Categorias cadastradas</label>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Acão</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (empty($categorias)) :
                                echo '<tr><th> Não há categorias a mostrar </tr></th>';
                            else :
                                foreach ($categorias as $categoria) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $categoria['nome_categoria']; ?></th>
                                        <th scope="row"> <a href="<?php echo BASE_URI . '/excluir-categoria/' . $categoria['categoria_id']; ?>">Excluir</a>
                                            &nbsp | &nbsp
                                            <a data-toggle="modal" data-target="#exampleModal" href="" onclick="consultarItem(<?php echo $categoria['categoria_id']; ?>)">Editar</a>
                                            <input type="hidden" value="<?php echo $categoria['categoria_id']; ?>">
                                        </th>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="categoriaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar categoria</h5>
                                </div>
                                <form method="POST" action="<?php echo BASE_URI.'/editar-categoria/'. $categoria['categoria_id']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nome categoria</label>
                                            <input type="text" class="form-control" id="nomeCate>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <input type="submit" class="btn btn-primary" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="http://localhost/easy-password/assets/js/jquery.min.js"></script>
<script src="http://localhost/easy-password/assets/js/bootstrap.min.js"></script>
<script src="http://localhost/easy-password/assets/js/toastr.min.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/main.js"></script>
<script src="http://localhost/easy-password/assets/js/editarCate.js"></script>

<!--common script for all pages-->
<script src="http://localhost/easy-password/assets/pnl/js/common-scripts.js"></script>

<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

</body>

</html>