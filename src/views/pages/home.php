<?php $render('header'); ?>

<main>
    <section>
        <article>
            <div class="container-sm margin_conteudo">
                <h2>Gere suas senhas de maneira fácil e pratica</h2>
                <br><br>
                <div class="field">
                    <strong> <label><h5>Preencha os dados:</h5></label> </strong><br><br>
                    <form id="form" action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nm_refe">Nome de referência </label>
                                <input type="text" class="form-control" id="nm_refe" onblur="verNomeRef()" placeholder="Nome referência" name="nome">
                                <small id="passwordHelpInline" class="text-muted">
                                   Opcional
                                </small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="carac">Qtd de caracteres</label>
                                <input type="number" class="form-control" id="carac" placeholder="Qtd caracteres" onblur="verQtdCaracter()" name="qtd-carac" aria-describedby="passwordHelpInline">
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
                                <input class="form-check-input" type="checkbox" id="carac_espe" name="carac_espe" value="1">
                                <label class="form-check-label" for="carac_espe">
                                    Caracteres especiais
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mai_min" name="carac_mai_min" value="1">
                                <label class="form-check-label" for="mai_min" name="carac_espe" >
                                    Gerar letras maiúsculas e minúsculas
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="salvar" name="salvar" value="1">
                                <label class="form-check-label" for="salvar" name="carac_espe">
                                   Salvar (somente para usuários cadastrados e logados)
                                </label>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Gerar senha">
                    </form>
                </div>
            </div>

            <div class="container-sm margin_conteudo">
                <div class="field">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto">
                                <center><h3><strong>Senha gerada:</strong></h3></center>
                            </div>
                            <div class="col col-lg-3">
                                <center><h3 id="senha">sjdiajdijasidj</h3></center>
                            </div>
                            <div class="col col-lg-2">
                                <center><button type="button" class="btn btn-info btn-sm">Copiar</button></center>
                            </div>
                        </div>   
                    </div>        
                </div>
            </div>          
        </article>
    </section>

    <br>

    <section>
        <article>
            <div class="container-sm margin_conteudo">
                <center><h2>Para conhecimento, leia:</h2></center>
                <hr>
                <p> <strong> 1.</strong> Nós da easy password nunca iremos pedir seu e-mail ou número de celular.</p>
                <p> <strong> 2.</strong> O cadastro em nosso site é feito a partir de um login genérico, então não confirmamos e-mail nem número de celular, isso faz com que nossos 
                clientes fiquem mais seguros com senhas cadastradas em nosso banco de dados com um login genérico e não com um e-mail que já é usado em algum lugar.</p>
                <p> <strong> 3.</strong> IMPORTANTE!. Você não terá direito de mudar a senha caso esqueça, já que não temos como verificar que você é realmente você, pois 
                não temos e-mail nem número de celulares cadastrados para a confirmação via e-mail ou SMS. <br><br> <strong> Então guarde bem seu login e senha pois uma vez esquecida não terá como trocar.</strong>
                </p>
               
            </div>
        </article>
    </section>

</main>

<?php $render('footer'); ?>
      