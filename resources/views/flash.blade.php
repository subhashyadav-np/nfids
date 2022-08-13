<script>
    function notification() {
        // alert(msg);
        $.notify({
            title: title,
            message: msg,
            icon: icon
        }, {
            type: type,
            allow_dismiss: true,
            newest_on_top: true,
            mouse_over: true,
            showProgressbar: false,
            spacing: 10,
            timer: 5000,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            delay: 3000,
            z_index: 10000,
            animate: {
                enter: 'animated bounceInRight',
                exit: 'animated bounceOutRight'
            }
        });
        
    };

</script>

@if ($message = Session::get('status'))
    <script>
        var title = 'Success : ';
        var icon = 'fas fa-check-circle';
        var type = 'success';
        var msg = '<?php echo $message; ?>';
        notification(msg, type, title, icon);

    </script>
@endif

@if ($message = Session::get('success'))
    <script>
        var title = 'Success : ';
        var icon = 'fas fa-check-circle';
        var type = 'success';
        var msg = '<?php echo $message; ?>';
        notification(msg, type, title, icon);

    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        var title = 'Error : ';
        var icon = 'fas fa-exclamation-circle';
        var type = 'danger';
        var msg = '<?php echo $message; ?>';
        notification(msg, type, title, icon);

    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        var title = 'Warning : ';
        var icon = 'fas fa-exclamation-triangle';
        var type = 'warning';
        var msg = '<?php echo $message; ?>';
        notification(msg, type, title, icon);

    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        var title = 'Info : ';
        var icon = 'fas  fa-info-circle';
        var type = 'info';
        var msg = '<?php echo $message; ?>';
        notification(msg, type, title, icon);

    </script>
@endif


@if ($errors->any())

    @foreach ($errors->all() as $error)
        <script>
            var title = 'Error : ';
            var icon = 'fas fa-exclamation-circle';
            var type = 'danger';
            var msg = '<?php echo $error; ?>';
            notification(msg, type, title, icon);

        </script>
    @endforeach

@endif
