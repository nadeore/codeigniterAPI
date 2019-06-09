<!-- Toastr style -->
<link href="<?php echo site_url($this->config->item('theme_path')); ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

 <!-- Toastr -->
<script src="<?php echo site_url($this->config->item('theme_path')); ?>js/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>