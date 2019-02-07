<!doctype html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("layouts/layout_dashboard/_partials/part_head") ?>

<body>
    <!-- Akses Demo -->
    <?php if ($this->session->userdata('akses') == '1') : ?>
    <div class="wrapper">

        <?php $this->load->view("layouts/layout_dashboard/_partials/part_sidebar") ?>
        <div class="main-panel">

            <?php $this->load->view("layouts/layout_dashboard/_partials/part_navbar") ?>

            <?php $this->load->view($view) ?>

            <?php $this->load->view("layouts/layout_dashboard/_partials/part_footer") ?>
        </div>
    </div>

    <!-- Plugin di samping sebelah kanan dashboard  -->
    <!-- <?php $this->load->view("layouts/layout_dashboard/_partials/part_fixedplugin") ?> -->

    <!-- Akses Admin -->
    <?php elseif ($this->session->userdata('akses') == '0') : ?>
    <div class="wrapper">

        <?php $this->load->view("layouts/layout_dashboard/_partials/part_sidebar") ?>
        <div class="main-panel">

        <?php $this->load->view("layouts/layout_dashboard/_partials/part_navbar") ?>

        <?php $this->load->view("admin/dashboard/view_dashboard") ?>
        <?php $this->load->view("layouts/layout_dashboard/_partials/part_footer") ?>
        </div>
    </div>

    <!-- Plugin di samping sebelah kanan dashboard  -->
    <!-- <?php $this->load->view("layouts/layout_dashboard/_partials/part_fixedplugin") ?> -->


    <?php else : ?>
    <!-- Akses Member Tidak ada footer -->
    <div class="wrapper">

        <?php $this->load->view("layouts/layout_dashboard/_partials/part_sidebar") ?>
        <div class="main-panel">

            <?php $this->load->view("layouts/layout_dashboard/_partials/part_navbar") ?>
            <?php $this->load->view($view) ?>
            
            <?php $this->load->view("layouts/layout_dashboard/_partials/part_footer") ?>

        </div>
    </div>

    <!-- Plugin di samping sebelah kanan dashboard  -->
    <!-- <?php $this->load->view("layouts/layout_dashboard/_partials/part_fixedplugin") ?> -->
    <?php endif; ?>
</body>

<?php $this->load->view("layouts/layout_dashboard/_partials/part_js") ?>
</div>

</html>