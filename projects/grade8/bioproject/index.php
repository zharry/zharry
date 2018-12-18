<?php
// disabling possible warnings
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php'); // including service class to work with database

$sCode = '';
$iItemId = (int)$_GET['id'];
if ($iItemId) { // View item output
    $aItemInfo = $GLOBALS['MySQL']->getRow("SELECT * FROM `s163_items` WHERE `id` = '{$iItemId}'"); // getting info about item from database
    $sCode .= '<h1>'.$aItemInfo['title'].'</h1>';
    $sCode .= '<br/><h3>'.$aItemInfo['description'].'</h3><br/>';
    $sCode .= '<h3><a href="'.$_SERVER['PHP_SELF'].'">Back to Chapter Selection</a></h3>';

    // drawing last 5 comments
    $sComments = '';
    $aComments = $GLOBALS['MySQL']->getAll("SELECT * FROM `s163_items_cmts` WHERE `c_item_id` = '{$iItemId}' ORDER BY `c_when` DESC LIMIT 5");
    foreach ($aComments as $i => $aCmtsInfo) {
        $sWhen = 'a';
        $sComments .= <<<EOF
<div class="comment" id="{$aCmtsInfo['c_id']}">
    <p>{$aCmtsInfo['c_name']}<span></span>:</p>
    <p>{$aCmtsInfo['c_text']}</p>
</div>
EOF;
    }

    ob_start();
    ?>
    <div class="container" id="comments">
        <h2>Comments</h2>
        <script type="text/javascript">
        function submitComment(e) {
            var sName = $('#name').val();
            var sText = $('#text').val();

            if (sName && sText) {
                $.post('comment.php', { name: sName, text: sText, id: <?= $iItemId ?> }, 
                    function(data){ 
                        if (data != '1') {
                          $('#comments_list').fadeOut(1000, function () { 
                            $(this).html(data);
                            $(this).fadeIn(1000); 
                          }); 
                        } else {
                          $('#comments_warning2').fadeIn(1000, function () { 
                            $(this).fadeOut(1000); 
                          }); 
                        }
                    }
                );
            } else {
              $('#comments_warning1').fadeIn(1000, function () { 
                $(this).fadeOut(1000); 
              }); 
            }
        };
        </script>

        <div id="comments_warning1" style="display:none">Don`t forget to fill both fields (Name and Comment)</div>
        <div id="comments_warning2" style="display:none">You can post no more than one comment every 10 minutes (spam protection)</div>
        <form onsubmit="submitComment(this); return false;">
            <table>
                <tr><td class="label"><label>Name: </label></td><td class="field"><input type="text" value="" title="Please enter your name" id="name" /></td></tr>
                <tr><td class="label"><label>Comment: </label></td><td class="field"><textarea name="text" id="text"></textarea></td></tr>
                <tr><td class="label">&nbsp;</td><td class="field"><input type="submit" value="Post comment" /></td></tr>
            </table>
        </form>
        <div id="comments_list"><?= $sComments ?></div>
    </div>
    <?php
    $sCommentsBlock = ob_get_clean();

} else {
    $sCode .= '<h1>Chapters</h1><br/>';

    $aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM `s163_items` ORDER by `when` ASC"); // taking info about all items from database
    foreach ($aItems as $i => $aItemInfo) {
        $sCode .= '<h2><a href="'.$_SERVER['PHP_SELF'].'?id='.$aItemInfo['id'].'">'.$aItemInfo['title'].'</a></h2>';
    }
}

?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Biography</title>

        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?= $sCode ?>
        </div>
        <?= $sCommentsBlock ?>
    </body>
</html>
