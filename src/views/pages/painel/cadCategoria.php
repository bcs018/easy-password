<?php 
if(!isset($_SESSION['log'])){
    $_SESSION['errorLog'] = '001';
    header('Location: '.BASE_URI);
}
$render('headerPainel', ['title' => 'easy password - Painel de controle']); ?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h2 class="mb"><i class="fa fa-angle-right"></i> Cadastro de categorias &nbsp
                       <i id="button" aria-describedby="tooltip" class="fa fa-info-circle" aria-hidden="true"></i>
                        <div id="tooltip" role="tooltip">
                            Ao cadastrar uma categoria, você pode vincular suas senhas a essa categoria <br>
                            EX: Senha XXX da categoria Facebook <br><br>
                            A vinculação pode ser feita no momento de salvar a senha ou no menu Visualizar senhas <br> do painel de controle
                            <div id="arrow" data-popper-arrow></div>
                        </div>
                    </h2>
                    <form class="form-horizontal style-form" method="post"
                        action="<?php echo BASE_URI; ?>/inserir-categoria">
                        <div class="form-group">
                            <label class="form-label">Nome da categoria</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomeCat" class="form-control">
                                <br>
                                <input class="btn btn-primary" type="submit" value="Cadastrar">
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <h4>Categorias cadastradas</h4>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Acão</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (empty($categorias)) :
                                echo '<tr>
                                        <th> Não há categorias a mostrar </th>
                                        <th></th>
                                      </tr>';
                            else :
                                foreach ($categorias as $categoria) : ?>
                            <tr>
                                <th scope="row"><?php echo $categoria['nome_categoria']; ?></th>
                                <th scope="row"> <a
                                        href="<?php echo BASE_URI . '/excluir-categoria/' . $categoria['categoria_id']; ?>">Excluir</a>
                                    &nbsp | &nbsp
                                    <a data-toggle="modal" data-target="#exampleModal" href=""
                                        onclick="consultarItem(<?php echo $categoria['categoria_id']; ?>)">Editar</a>
                                    <input type="hidden" value="<?php echo $categoria['categoria_id']; ?>">
                                </th>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="categoriaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar categoria</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nome categoria</label>
                                        <input type="text" class="form-control" id="nomeCate" autofocus>
                                        <input type="hidden" value="" id="catid">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="fechar"
                                        data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary" id="enviar">Editar</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</section>
<section id="main-content">
    <section class="wrapper">
    <center> 
        <h1>
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp Aviso&nbsp <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        </h1>
    </center>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h6> 
                        <strong>1.</strong> Jamais, em hipótese alguma compartilhe essa tela com alguem, apesar de não conter dados usuais onde podem
                        ser acessado contas de redes sociais, é de suma importância a proteção desses dados.
                    </h6>
                    <h6>
                        <strong>2.</strong> Sempre que for sair do site <u style="color: #ed3f05;"><strong>LEMBRE-SE DE SAIR DA SUA CONTA</strong></u> para que ninguem acesse seu painel 
                        de controle por esse computador.
                    </h6>
                </div>
            </div>
        </div>
    </section>
</section>
<br><br><br>

<?php $render('footerPainel'); ?>