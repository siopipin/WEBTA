<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("layouts/layout_dashboard/_partials/part_head") ?>
</head>

<body>

    <?php $this->load->view("layouts/layout_auth/_partials/part_navbar") ?>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black">
           
            <?php $this->load->view("admin/auth/view_login") ?>

            <!-- footer -->
            <?php $this->load->view("layouts/layout_auth/_partials/part_footer")?>
        </div>
    </div>
</body>
<?php $this->load->view("layouts/layout_auth/_partials/part_js") ?>

</html>