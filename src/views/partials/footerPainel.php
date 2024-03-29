<script>
    const button = document.querySelector('#button');
    const button2 = document.querySelector('#button2');
    const tooltip = document.querySelector('#tooltip');

    let popperInstance = null;

    function create() {
        popperInstance = Popper.createPopper(button, tooltip, {
            modifiers: [{
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            }, ],
        });
    }

    function destroy() {
        if (popperInstance) {
            popperInstance.destroy();
            popperInstance = null;
        }
    }

    function show() {
        tooltip.setAttribute('data-show', '');
        create();
    }

    function hide() {
        tooltip.removeAttribute('data-show');
        destroy();
    }

    const showEvents = ['mouseenter', 'focus'];
    const hideEvents = ['mouseleave', 'blur'];

    showEvents.forEach(event => {
        button.addEventListener(event, show);
    });

    hideEvents.forEach(event => {
        button.addEventListener(event, hide);
    });
</script>

<!-- js placed at the end of the document so the pages load faster -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="/assets/js/toastr.min.js"></script>
<script src="/assets/pnl/js/main.js"></script>
<script src="/assets/js/editarCate.js"></script>
<script src="/assets/js/editarSen.js"></script>
<script src="/assets/js/altDadosCadastral.js"></script>

<!--common script for all pages-->
<script src="/assets/pnl/js/common-scripts.js"></script>

<?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

</body>

</html>