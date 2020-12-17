<?php $render('header', ['title'=>'easy password - Gerador de senhas']); ?>

<main>
    <section>
        <article>
            <div class="container-sm margin_conteudo">
                <h2>Gere suas senhas de maneira fácil e pratica</h2>
                <br><br>
                <div class="field">
                    <strong> <label>
                            <h5>Preencha os dados:</h5>
                        </label> </strong><br><br>
                    <form id="form" action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carac">Quantidade de caracteres</label>
                                <input type="number" class="form-control" id="carac" onblur="verQtdCaracter()"
                                    name="qtd-carac" aria-describedby="passwordHelpInline">
                                <div class="invalid-feedback">
                                    Por favor, informe de 1 até 30 caracteres.
                                </div>
                                <small id="passwordHelpInline" class="text-muted">
                                    Deve ter até 30 caracteres.
                                </small>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="carac_espe" name="carac_espe"
                                    value="1">
                                <label class="form-check-label" for="carac_espe">
                                    Caracteres especiais
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="maius" name="carac_mai" value="1">
                                <label class="form-check-label" for="maius" name="carac_espe">
                                    Gerar letras maiúsculas
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="minus" name="carac_min" value="1">
                                <label class="form-check-label" for="minus" name="carac_espe">
                                    Gerar letras minúsculas
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="numero" name="numero" value="1">
                                <label class="form-check-label" for="numero" name="carac_espe">
                                    Gerar números
                                </label>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['log'])): ?>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="salvar" name="salvar" value="1">
                                <label class="form-check-label" for="salvar" name="carac_espe">
                                    Salvar senha
                                </label>
                            </div>
                        </div>
                        <?php else: ?>
                        <b>
                            <p>OBS: Para salvar sua senha, você deve se cadastrar e logar no site, e aparecera uma opção
                                aqui para salvar a senha!</p>
                        </b>
                        <?php endif; ?>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Gerar senha">
                    </form>


                    <div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="categoriaLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Salvar senha</h5>
                                </div>
                                <form method="POST" id="form3" action="/">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Selecione a
                                                categoria</label>
                                            <select class="form-control" id="selectCategoria">
                                                <option value="0">Sem categoria</option>
                                                <?php foreach ($categorias as $categoria): ?>
                                                <option value="<?php echo $categoria['categoria_id']; ?>">
                                                    <?php echo $categoria['nome_categoria']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <br>
                                            <label for="recipient-name" class="col-form-label">Senha a ser salva (altere
                                                se quiser)</label>
                                            <input type="text" class="form-control" id="senhaSalvar" value="">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" id="fechar"
                                            data-dismiss="modal">Fechar</button>
                                        <input type="submit" class="btn btn-primary" id="enviar" value="Salvar">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div id="erro"></div>

                </div>
            </div>

            <div class="container-sm margin_conteudo">
                <div class="field">
                    <center>
                        <h3><strong>Senha gerada:</strong></h3>
                        <br>
                        <div class="mb-3">
                            <input type="text" class="senha form-control" id="senha" name="senha" readonly>
                        </div>

                        <div class="col col-lg-2">
                            <br><button type="button" id="bCopy" class="btn btn-info btn-sm">Copiar</button>
                        </div>
                    </center>
                </div>
            </div>
        </article>
    </section>

    <br>

    <section>
        <article>
            <div class="container-sm margin_conteudo">
                <center>
                    <h2>Para conhecimento, leia:</h2>
                </center>
                <hr>
                <p> <strong> 1.</strong> Nós da easy password nunca iremos pedir seu e-mail ou número de celular.</p>
                <p> <strong> 2.</strong> O cadastro em nosso site é feito a partir de um login genérico, então não
                    confirmamos e-mail nem número de celular, isso faz com que nossos
                    clientes fiquem mais seguros com senhas cadastradas em nosso banco de dados com um login genérico e
                    não com um e-mail que já é usado em algum lugar.</p>
                <p> <strong> 3.</strong> IMPORTANTE!. Você não terá direito de recuperar a senha caso esqueça, já que
                    não temos como verificar que você é realmente você, pois
                    não temos e-mail nem número de celulares cadastrados para a confirmação via e-mail ou SMS. <br><br>
                    <strong> Então guarde bem seu login e senha pois uma vez esquecida não terá como trocar.</strong>
                </p>

            </div>
        </article>
    </section>

</main>

<?php $render('footer'); ?>