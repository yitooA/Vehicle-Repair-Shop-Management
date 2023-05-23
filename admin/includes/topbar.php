<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../assets/image/logo.png">
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="notifications-icon" style="position: relative;">
                    <i class="fa fa-bell"></i>
                </a>
                <div class="notification-popout" style="display: none; position: absolute; top: 100%; right: 0; padding: 10px; width: 300px; background-color: #f8f8f8; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <p>Notification message goes here</p>
                </div>
            </li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>

<script>
    // Close notification pop-out when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.notifications-icon').length && !$(e.target).closest('.notification-popout').length) {
            $('.notification-popout').hide();
        }
    });

    // Toggle display of notification pop-out
    $('.notifications-icon').on('click', function() {
        $('.notification-popout').toggle();
    });
</script>
