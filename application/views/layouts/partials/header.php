<!DOCTYPE html>
<html dir="ltr" lang="en-US"  xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <?php if (isset($head_title)) { ?><meta name="title" content="<?php echo $head_title; ?>"><?php } ?>
            <?php if (isset($head_description)) { ?><meta name="description" content="<?php echo $head_description; ?>"><?php } ?>
                <?php if (isset($head_keywords)) { ?><meta name="keywords" content="<?php echo $head_keywords; ?>"><?php } ?>
                    <?php if (isset($head_title)) { ?><title><?php echo $head_title; ?></title><?php } ?>

                    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" />
                    <?php if ( (isset($custom_css)) && (!empty($custom_css)) ) { ?><style type="text/css" media="all"><?php echo  $custom_css ?></style><?php } ?>
                    
                    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
                    <script type="text/javascript" charset="utf-8">
                        google.load("jquery", "1.6.2");
                    </script>

                    <script type="text/javascript">
                        var base_url = "<?php echo base_url(); ?>";                  
                    </script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>

                    <?php if (!empty($arCustomJSfiles)) {
                        foreach ($arCustomJSfiles as $js_file_path) {
                            ?>
                            <script type="text/javascript" src="<?php echo base_url() . $js_file_path; ?>"></script>
                        <?php }
                    } ?>
                    <?php if ((isset($custom_js)) && (!empty($custom_js))) { ?><script type="text/javascript"><?php echo $custom_js ?></script><?php } ?>

                    <?php if (!empty($arCustomCSSfiles)) {
                        foreach ($arCustomCSSfiles as $arCss_file_path) {
                            ?>
        <?php if (!empty($arCss_file_path['start_condition'])) {
            echo $arCss_file_path['start_condition'];
        } ?><link rel="stylesheet" href="<?php echo base_url() . $arCss_file_path['file']; ?>" /><?php if (!empty($arCss_file_path['end_condition'])) {
            echo $arCss_file_path['end_condition'];
        } ?>

    <?php }
} ?>     
                    </head>