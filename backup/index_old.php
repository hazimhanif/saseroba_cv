<?php

$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');


use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

    $handler = new Handler();
    $handler->getJavascriptAntiBot();


?>

<!DOCTYPE html>
<html lang="en">
<head>
           <style type="text/css">
                html
                {
                    width: 100%;
                    height: 100%;
                }
                body
                {
                    display: flex;
                    justify-content: center;
                    align-items: center;
    .fixer-container {
      float: left;
      position: relative;
      left: -50%;
    }
            </style>

    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>SASEROBA CV Search</title>

    <!-- Live Search Styles -->
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/ajaxlivesearch.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<!-- Search Form Demo -->
<form action="cv/index.php" method="post" class="search"> 
<div style="clear: both">
    <input name="ls_query" type="text" class='mySearch' id="ls_query" placeholder="Type ['Name' or 'Tags' or 'Interest'] to start searching ..." value="">
                <input type=hidden name="FirstName" value="" />
                <input type=hidden name="LastName" value="" />
    <input type="submit" name="submit" value="Get CV">
</div>
<!-- /Search Form Demo -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="js/ajaxlivesearch.min.js"></script>


<script>
jQuery(document).ready(function(){
    jQuery(".mySearch").ajaxlivesearch({
        loaded_at: <?php echo time(); ?>,
        token: <?php echo "'" . $handler->getToken() . "'"; ?>,
        max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
        onResultClick: function(e, data) {
            // get the index 0 (first column) value
            selectedOne = jQuery(data.selected).find('td').eq('0').text();
            selectedTwo = jQuery(data.selected).find('td').eq('1').text();
            comb = selectedOne + ' ' + selectedTwo;

            // set the input value
            jQuery('#ls_query').val(comb);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');

            document.getElementsByName('FirstName')[0].value = selectedOne;
            document.getElementsByName('LastName')[0].value = selectedTwo;

        },
        onResultEnter: function(e, data) {
            // get the index 0 (first column) value
            selectedOne = jQuery(data.selected).find('td').eq('0').text();
            selectedTwo = jQuery(data.selected).find('td').eq('1').text();
            comb = selectedOne + ' ' + selectedTwo;

            // set the input value
            jQuery('#ls_query').val(comb);

            // hide the result
            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');

            document.getElementsByName('FirstName')[0].value = selectedOne;
            document.getElementsByName('LastName')[0].value = selectedTwo;
        },
        onAjaxComplete: function(e, data) {

        }
    });
})
</script>

</body>
</html>
