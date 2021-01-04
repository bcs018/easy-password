   <footer class="footer">
        <div class="container">
            <hr><br>
            <div class="row">
                <div class="col-sm">
                    © 2021 easy password · Todos os direitos reservados.
                </div>
               
                <div class="col-auto mr-auto">
                    Desenvolvido por:<a href="http://bcsdev.ga" id="bcs" target="blank"> <strong>BCS Dev</strong></a>
                </div>
            </div>
        </div>
    </footer>

        <script src="<?php echo BASE_ASS; ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/popper.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/geraSenha.js" type="text/javascript"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/buttonCopy.js" type="text/javascript"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/cadastro.js" type="text/javascript"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/login.js" type="text/javascript"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/toastr.min.js"></script>
        <script src="<?php echo BASE_ASS; ?>/assets/js/salvarSenha.js"></script>
        
    
    <?php 
    if(isset($_SESSION['errorLog'])): ?>
        <?php 
        echo $_SESSION['errorLog'];
        unset($_SESSION['errorLog']);
         ?>
        
    <?php endif; ?>

    </body>
</html>