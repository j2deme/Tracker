<?php
setlocale(LC_ALL, 'es_MX');
?>
<!-- header.tpl -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->eprint($this->title); ?></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|Inconsolata|PT+Sans:400,700">
        <?php
        $styles = array(
            "bootstrap.less"
            ,"default.less"
            //,"fileuploader.css"
            ,"iconic.less"
            );
        foreach($styles as $stl){
            print '<link rel="stylesheet/less" type="text/css" href="/'.$this->WD.'/assets/css/'.$stl.'">'."\n\t";
        }
        $javascripts = array(
            "jquery-1.6.4.min.js"
            ,"less-1.1.3.min.js"
            //,"prettify.js"
            ,"bootstrap-modal.js"
            ,"bootstrap-alerts.js"
            //,"bootstrap-twipsy.js"
            //,"bootstrap-popover.js"
            //,"bootstrap-dropdown.js"
            //,"bootstrap-scrollspy.js"
            //,"bootstrap-tabs.js"
            ,"jquery.timeago.js"
            ,"jquery.form.js"
            ,"happy.js"
            ,"happy.methods.js"
            ,"gmap3.min.js"
            ,"default.js"
            );
        foreach($javascripts as $js){
            print '<script src="/'.$this->WD.'/assets/js/'.$js.'" type="text/javascript"></script>'."\n\t";
        }
        ?>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/<?php echo $this->WD; ?>/assets/img/favicon.png">
    </head>
    <body>
