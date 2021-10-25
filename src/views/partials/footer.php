   <footer class="footer">
        <div class="container">
            <hr><br>
            <div class="row">
                <div class="col-sm">
                    © 2021 easy password · Todos os direitos reservados.
                </div>
               
                <div class="col-auto mr-auto">
                    Desenvolvido por:<a target="_blank" href="https://bcsdev.ga" id="bcs" target="blank"> <strong>BCS Dev</strong></a>
                </div>
            </div>
        </div>
    </footer>

        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/popper.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/geraSenha.js" type="text/javascript"></script>
        <script src="/assets/js/buttonCopy.js" type="text/javascript"></script>
        <script src="/assets/js/cadastro.js" type="text/javascript"></script>
        <script src="/assets/js/login.js" type="text/javascript"></script>
        <script src="/assets/js/toastr.min.js"></script>
        <script src="/assets/js/salvarSenha.js"></script>
        
    
    <?php 
    if(isset($_SESSION['errorLog'])): ?>
        <?php 
        echo $_SESSION['errorLog'];
        unset($_SESSION['errorLog']);
         ?>
        
    <?php endif; ?>

    </body>
</html>