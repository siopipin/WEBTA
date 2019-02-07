<!doctype html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("landing/layout/_partials/part_head")?>

<body>

    <?php $this->load->view("landing/layout/_partials/part_navbar")?>

    <?php $this->load->view($view) ?>
    <?php $this->load->view("landing/layout/_partials/part_footer")?>
</body>

<?php $this->load->view("landing/layout/_partials/part_js")?>

</html>

<!-- Pencarian dengan ajax -->
<script>
$(document).ready(function() {

    load_data();

    function load_data(query) {
        $.ajax({
            url: "<?php echo base_url(); ?>controller_landing/cariBuku",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('#result').html(data);
            }
        })
    }

    $('#search_text').keyup(function() {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        } else {
            load_data();
        }
    });

    

    $('#search_option').change(function() {
        var ops = $(this).val();
        if (ops != '') {
            load_data(ops);
        } else {
            load_data();
        }
    });

    $('#search_option2').change(function() {
        var ops = $(this).val();
        if (ops != '') {
            load_data(ops);
        } else {
            load_data();
        }
    });

    
});
</script>
