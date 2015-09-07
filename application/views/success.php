<?php
/**
 * Created by PhpStorm.
 * User: POSCO_ICT_HAILONG
 * Date: 18/06/2015
 * Time: 9:28 AM
 */?>

<section id="content">
    <div class="container">
        <div id="main">
            <?php if(($message)=='success'){?>
            <div class="alert alert-success">
                <?php echo $this->lang->line('suscessmessage')?>                            <span class="close"></span>
            </div>
            <?php }?>
            <?php if(($message)=='fail'){?>
            <div class="alert alert-error">
                <?php echo $error?>                            <span class="close"></span>
            </div>
            <?php }?>
            <br />
            <a class="button btn-small sky-blue1" onclick="history.go(-1);">Go Back</a>
        </div>
    </div>
</section>