<?php 
$render('headerPainel', ['title' => 'easy password - Painel de controle']); 
?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h2 class="mb"><i class="fa fa-angle-right"></i> Cadastro de categorias</h2>
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

                    <label class="form-label">Categorias cadastradas</label>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Acão</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php if(empty($categorias)):
                            echo '<tr><th> Não há categorias a mostrar </tr></th>';
                        else:
                            foreach($categorias as $categoria): ?>
                            <tr>
                                <th scope="row"><?php echo $categoria['nome_categoria']; ?></th>
                                <th scope="row"> <a href="<?php  echo BASE_URI.'/excluir-categoria/'. $categoria['categoria_id'];?>">Excluir</a> &nbsp | &nbsp
                                                 <a href="<?php echo BASE_URI. '/editar-categoria/'.$categoria['categoria_id'];?>">Editar</a>  </th>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
</section>




<!-- js placed at the end of the document so the pages load faster 
<script src="http://localhost/easy-password/assets/pnl/js/jquery.js"></script>-->
<script src="http://localhost/easy-password/assets/pnl/js/jquery.min.js"></script>
<!--<script src="http://localhost/easy-password/assets/pnl/js/bootstrap.min.js"></script>-->
<script src="http://localhost/easy-password/assets/pnl/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/easy-password/assets/js/toastr.min.js"></script>
<script class="include" type="text/javascript"
    src="http://localhost/easy-password/assets/pnl/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/jquery.scrollTo.min.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/jquery.sparkline.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/main.js"></script>



<!--common script for all pages-->
<script src="http://localhost/easy-password/assets/pnl/js/common-scripts.js"></script>

<script type="text/javascript" src="http://localhost/easy-password/assets/pnl/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="http://localhost/easy-password/assets/pnl/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="http://localhost/easy-password/assets/pnl/js/sparkline-chart.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/zabuto_calendar.js"></script>

<?php 
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
} 
?>

</body>

</html>