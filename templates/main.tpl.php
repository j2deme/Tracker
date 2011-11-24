<!-- BEGIN header -->
<?php echo $this->header; ?>
<!-- END header -->

<!-- BEGIN main -->
    <div class="container">
        <div class="content">
            <div class="page-header">
                <h1><?php echo $this->eprint($this->pageName); ?>&nbsp;<small><?php echo $this->eprint($this->tagline); ?></small></h1>
            </div>
            <div class="row">
                <div id="content" class="span10">
                    <div id="alert-area">
                        <?php
                        if(isset($_SESSION['flash']['message'])){
                            $flash = $_SESSION['flash'];
                            $type = $flash['message']['type'];
                            $msg = $flash['message']['msg'];
                            echo '<div class="alert-message '.$type.' fade in" data-alert="alert">';
                            echo '<a class="close" href="#">×</a>';
                            echo '<p>'.$msg.'</p>';
                            echo '</div>';
                            unset($_SESSION['flash']);
                        }
                        ?>
                    </div>
                    <?php echo $this->body; ?>
                </div>
                <div id="sidebar" class="span4">
                    <?php if(isset($this->sidebar)){ echo $this->sidebar;} ?>
                </div>
            </div>
        </div>
    </div> <!-- container -->
<!-- END main -->

<!-- BEGIN footer -->
<?php echo $this->footer; ?>
<!-- END footer -->
