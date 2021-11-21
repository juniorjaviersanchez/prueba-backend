    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="public/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="public/js/materialize.min.js"></script>
    <script type="text/javascript" src="public/js/index.js"></script>
    <script type="text/javascript" src="public/js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Toastr JS-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tabs").tabs();

            //Los mensajes de Notificaciones
            switch ('<?php echo $this->mensaje[0] ?>') {
                case 'G':
                    toastr.success('<?php echo $this->mensaje[1]; ?>');
                    break;
                case 'E':
                    toastr.success('<?php echo $this->mensaje[1]; ?>');
                    break;
                case 'I':
                    toastr.info('<?php echo $this->mensaje[1]; ?>');
                    break;
                default:
                break;
            }
        });
    </script>
</body>

</html>