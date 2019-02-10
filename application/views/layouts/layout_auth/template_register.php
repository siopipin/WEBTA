<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php $this->load->view("layouts/layout_dashboard/_partials/part_head") ?>

<body>
    <?php $this->load->view("layouts/layout_auth/_partials/part_navbar") ?>

    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black">
            <!-- konten -->
            <?php $this->load->view("admin/auth/view_register") ?>

            <!-- footer -->
            <?php $this->load->view("layouts/layout_auth/_partials/part_footer") ?>
        </div>
    </div>
</body>

<!-- javascript -->
<?php $this->load->view("layouts/layout_auth/_partials/part_js") ?>

</html>