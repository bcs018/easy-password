<?php
if (!isset($_SESSION['log'])) {
    $_SESSION['errorLog'] = '<script> toastr.error("Usuário não logado!"); </script>';
    header('Location: ' . BASE_URI);
}

if(!isset($_SESSION['hash'])){
	$_SESSION['hash'] = md5(time().rand(0,999));
}

$render('headerPainel', ['title' => 'easy password - Painel de controle']); ?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h2 class="mb"><i class="fa fa-angle-right"></i> Minhas senhas </h2>
                    <br>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Senha</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Senha modificada</th>
                                <th scope="col">Acão</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (empty($senhas)) :
                                echo '<tr>
                                        <th> Não há senhas a mostrar </th>                
                                        <th></th>
                                        <th></th>
                                      </tr>';
                            else :
                                foreach ($senhas as $senha) : ?>
                                    <tr>
                                        <th scope="row"><?php echo addslashes($senha['senha_usu']); ?></th>
                                        <th scope="row"><?php echo $senha['nome_categoria']; ?></th>
                                        <th scope="row">
                                            <?php if ($senha['alterado'] == 1) :
                                                echo "SIM";
                                            else :
                                                echo "NÃO";
                                            endif; ?>
                                        </th>
                                        <th scope="row"> 
                                            <a href="<?php echo BASE_URI; ?>/painel/excluir-senha/<?php echo $senha['senha_id']; ?>/<?php echo $senha['categoria_id']; ?>">Excluir</a>
                                            &nbsp; | &nbsp;
                                            <a data-toggle="modal" data-target="#a" href="" onclick="consultarItemSenha(<?php echo $senha['senha_id'] . ',' . $senha['categoria_id']; ?>)">Editar</a>
                                        </th>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="modal fade" id="senha" tabindex="-1" role="dialog" aria-labelledby="senhaLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar senha e categoria</h5>
                                </div>
                                <form action="<?php echo BASE_URI; ?>/painel/editar-senha" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Nova senha</label>
                                            <input type="text" class="form-control" name="senhaN" id="senhaN" value="" autofocus>
                                            <input type="hidden" name="hash3" value="<?php echo $_SESSION['hash']; ?>">
                                            <input type="hidden" name="senid" id="senid" value="">
                                            <input type="hidden" name="catid" id="catid" value="">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Selecione as categorias da senha</label>
                                            <br>

                                            <?php
                                            $i = 0;
                                            foreach ($categorias as $categoria) : ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $categoria['categoria_id']; ?>" id="flexCheckDefault<?php echo $i; ?>" name="categoria[]">
                                                    <label class="form-check-label" for="flexCheckDefault<?php echo $i++; ?>">
                                                        <?php echo $categoria['nome_categoria']; ?>
                                                    </label>
                                                    <input type="hidden">
                                                </div>
                                            <?php endforeach; ?>

                                            <br>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" id="fechar" data-dismiss="modal">Fechar</button>
                                        <input type="submit" class="btn btn-primary" name="enviarS" value="Editar">
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
                        <strong>1.</strong> Jamais, em hipótese alguma compartilhe essa tela com alguem, apesar de não
                        conter dados usuais onde podem
                        ser acessado contas de redes sociais, é de suma importância a proteção desses dados.
                    </h6>
                    <h6>
                        <strong>2.</strong> Sempre que for sair do site <u style="color: #ed3f05;"><strong>LEMBRE-SE DE
                                SAIR DA SUA CONTA</strong></u> para que ninguem acesse seu painel
                        de controle por esse computador.
                    </h6>
                </div>
            </div>
        </div>
    </section>
</section>
<br><br><br>

<?php $render('footerPainel'); ?>