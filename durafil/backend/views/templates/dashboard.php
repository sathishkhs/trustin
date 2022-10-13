<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <?php $this->load->view('templates/includes/head'); ?>
    <body>
        <?php if (empty($popup_view)): ?>
        <?php $this->load->view('templates/includes/sidebar_menu'); ?>
        <?php endif ?>
        <!-- Right Panel -->        
            <div <?php echo (empty($popup_view)) ? 'id="right-panel" class="right-panel"' : '' ?>>
                <?php if (empty($popup_view)): ?>
                <?php $this->load->view('templates/includes/navigation'); ?>
                <?php $this->load->view('templates/includes/breadcrumb'); ?>
                <!-- Content -->
                 <?php endif ?>
                <div class="content" style="min-height:600px; padding: 10px;">
                    <div class="animated fadeIn">
                        <?php //$this->load->view('templates/includes/boxes'); ?>
                        <?php $this->load->view('templates/includes/body'); ?>
                    </div>
                </div>
                <!-- /.content -->
                <div class="clearfix"></div>
                <?php $this->load->view('templates/includes/footer') ?>
            </div>
            <?php $this->load->view('templates/includes/scripts'); ?>
            <!-- scripts related to this page -->
            <?php if (!empty($scripts) && count($scripts) > 0): ?>
                <?php foreach ($scripts as $script): ?>
                    <script src="<?php echo $script; ?>"></script>
                <?php endforeach ?>
            <?php endif ?>
    </body>
</html>
