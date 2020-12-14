<?php $render('headerPainel', ['title' => 'easy password - Painel de controle']); ?>

<section id="main-content">
    <section class="wrapper">

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Cadastro de senhas</h4>
                    <form class="form-horizontal style-form" method="get">

                        <div class="form-group">
                            <label class="form-label">Selecione a categoria</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>Selecionar...</option>
                                    <option>Facebook</option>
                                    <option>Instagram</option>
                                    <option>Twitter</option>
                                    <option>Sem categoria</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Informe a senha</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Senha">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Observação</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Observação"></textarea>
                                <span class="help-block">Opcional.</span>
                            </div>
                        </div>

                        

                        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Tooltip on top">
                            Tooltip on top
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Tooltip on right">
                            Tooltip on right
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Tooltip on bottom">
                            Tooltip on bottom
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                            data-bs-placement="left" title="Tooltip on left">
                            Tooltip on left
                        </button>



                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Help text</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                                <span class="help-block">A block of help text that breaks onto a new line and may extend
                                    beyond one line.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Rounder</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Input focus</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Disabled</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="disabledInput" type="text"
                                    placeholder="Disabled input here..." disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="placeholder">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Static control</label>
                            <div class="col-lg-10">
                                <p class="form-control-static">email@example.com</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- col-lg-12-->
        </div><!-- /row -->

        <!-- INLINE FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-theme">Sign in</button>
                    </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->

        <!-- INPUT MESSAGES -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Input Messages</h4>
                    <form class="form-horizontal tasi-form" method="get">
                        <div class="form-group has-success">
                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Input with success</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>
                        </div>
                        <div class="form-group has-warning">
                            <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Input with warning</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputWarning">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label class="col-sm-2 control-label col-lg-2" for="inputError">Input with error</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputError">
                            </div>
                        </div>
                    </form>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->
        </div><!-- /row -->

        <!-- INPUT MESSAGES -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Checkboxes, Radios & Selects</h4>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Option one is this and that&mdash;be sure to include why it's great
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>

                    <hr>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                    </label>

                    <hr>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <br>
                    <select multiple class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div><!-- /form-panel -->
            </div><!-- /col-lg-12 -->

            <!-- CUSTOM TOGGLES -->
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Custom Toggles</h4>
                    <div class="row mt">
                        <div class="col-sm-6 text-center">
                            <input type="checkbox" checked="" data-toggle="switch" />
                        </div>
                        <div class="col-sm-6 text-center">
                            <input type="checkbox" data-toggle="switch" />
                        </div>
                    </div>
                    <div class="row mt">
                        <div class="col-sm-6 text-center">
                            <div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>"
                                data-off-label="<i class='fa fa-times'></i>">
                                <input type="checkbox" />
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="switch switch-square" data-on-label="<i class=' fa fa-check'></i>"
                                data-off-label="<i class='fa fa-times'></i>">
                                <input type="checkbox" checked="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt">
                        <div class="col-sm-6 text-center">
                            <input type="checkbox" disabled data-toggle="switch" />
                        </div>
                        <div class="col-sm-6 text-center">
                            <input type="checkbox" checked disabled data-toggle="switch" />
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /row -->

    </section>
</section>


<!-- js placed at the end of the document so the pages load faster 
<script src="http://localhost/easy-password/assets/pnl/js/jquery.js"></script>-->
<script src="http://localhost/easy-password/assets/pnl/js/jquery.min.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/bootstrap.min.js"></script>
<script src="http://localhost/easy-password/assets/pnl/js/bootstrap.bundle.min.js"></script>
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

</body>

</html>