<?php
if (!isset($_SESSION['log'])) {
    $_SESSION['errorLog'] = '001';
    header('Location: ' . BASE_URI);
}
$render('headerPainel', ['title' => 'easy password - Painel de controle']); ?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h2 class="mb"><i class="fa fa-angle-right"></i> Dados cadastrais </h2><hr>
                    <h4>Alterar nickname</h4><br>
                    <div class="form-group">
                        <label class="form-label">Alterar ou adicionar nickname (apelido)</label>
                        <div class="col-sm-10">
                            <input type="text" id="nickCad" name="nick" value="<?php echo $_SESSION['log']['nick']; ?>" class="form-control">
                            <input type="hidden" id="nickId" value="<?php echo $_SESSION['log']['id']; ?> ">
                            <br>
                            <button class="btn btn-primary" id="altNick">Alterar</button>
                        </div>
                    </div>
                    <hr><br>
                    <h4>Alterar senha</h4><br>
                    <div class="form-group">
                        <label class="form-label">Nova senha</label>
                        <div class="col-sm-10">
                            <input type="password" id="senhaCad" name="senha" placeholder="Insira a nova senha" class="form-control">
                            <input type="hidden" id="senhaId" value="<?php echo $_SESSION['log']['id']; ?> ">
                        </div>
                        <br>
                        <label class="form-label">Repita a nova senha</label>
                        <div class="col-sm-10">
                            <input type="password" id="senhaCadRep" name="senhaRep" placeholder="Repita a nova senha" class="form-control">
                            <br>
                            <button class="btn btn-primary" id="altSen">Alterar</button>
                        </div>
                    </div>
                    <br><br>

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