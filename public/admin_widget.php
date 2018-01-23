<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>
    <p><h3>Blocked IP</h3></p>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post" >
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">IP</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $gen = Yaurau_IP_Blocker::getIPDB();
                    foreach ($gen as $key=>$val) { ?>
                        <tr>
                            <th scope="row">
                                <input type="checkbox" name ="delete" value="<?php echo $val; ?>">
                                <?php echo ($key+1); ?>
                            </th>
                            <td class="<?php echo 1; ?>">
                                <?php echo $val.'-'.$key; ?>
                            </td>
                        </tr>
                    <?php } echo $gen->getReturn(), PHP_EOL; ?>
                    </tbody>
                </table>
                <input align="right" type="submit"  value="Delete" id="btn">

                <?php echo $_POST['delete'] ?>
                <?php
                    if(!empty($_POST['delete'])){
                        $delete = new Yaurau_IP_Blocker();
                        $delete->setIP = $_POST['delete'];
                        $delete->deleteIPBlocked();}
                    else{
                        echo "Ничего не выбрано";

                    }
                ?>
            </form>
            <script>
                jQuery(document).ready(function(){
                    jQuery('#btn').click(function(){
                        jQuery('td.<?php echo $_POST['delete']; ?>').css('background', '#CC0000')
                    })
                })
            </script>

        </div>
        <div class="col-md-3"></div>
    </div>
    <p><h3>Add IPv4</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIP" maxlength="3" size="2">.
        <input type="text" name="secondblockIP" maxlength="3" size="2">.
        <input type="text" name="thirdblockIP" maxlength="3" size="2">.
        <input type="text" name="fourthblockIP" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submit">
    </form>
    </p>
    <?php
    if(!empty($_POST['firstblockIP'])&&!empty($_POST['secondblockIP'])&& !empty($_POST['thirdblockIP'])&&!empty($_POST['fourthblockIP'])&& is_numeric($_POST['firstblockIP']) && is_numeric($_POST['secondblockIP']) && is_numeric($_POST['thirdblockIP']) && is_numeric($_POST['fourthblockIP']))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $_POST['firstblockIP'] .'.'. $_POST['secondblockIP'] . '.' .$_POST['thirdblockIP'] . '.' . $_POST['fourthblockIP'];
        $l->enterIP();
        echo "IP $l->set blocked";
    }
    if($_POST['submit'] &&
        (empty($_POST['firstblockIP']) || empty($_POST['secondblockIP'])|| empty($_POST['thirdblockIP'])|| empty($_POST['fourthblockIP']) || !is_numeric($_POST['firstblockIP']) || !is_numeric($_POST['secondblockIP']) || !is_numeric($_POST['thirdblockIP']) || !is_numeric($_POST['fourthblockIP'])
        )
    ) {
        $IP = $_POST['firstblockIP'] .'.'. $_POST['secondblockIP'] . '.' .$_POST['thirdblockIP'] . '.' . $_POST['fourthblockIP'];
        echo "Incorrect IP $IP";
    }
    ?>
    <p><h3>Add IPv6</h3>
    <form action=<?php echo '"options-general.php?page=' . MY_PLAGIN_PAGE .'"' ?> method="post">
        <label>Enter the IP</label>
        <input type="text" name="firstblockIPv6" maxlength="3" size="2">:
        <input type="text" name="secondblockIPv6" maxlength="3" size="2">:
        <input type="text" name="thirdblockIPv6" maxlength="3" size="2">:
        <input type="text" name="fourthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="fifthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="sixthblockIPv6" maxlength="3" size="2">:
        <input type="text" name="seventhblockIPv6" maxlength="3" size="2">:
        <input type="text" name="eighthblockIPv6" maxlength="3" size="2">
        <input type="submit" value="Enter" name="submitv6">
    </form>
    </p>
    <?php
    if(!empty($_POST['firstblockIPv6'])&&!empty($_POST['secondblockIPv6']) && !empty($_POST['thirdblockIPv6'])&&!empty($_POST['fourthblockIPv6']) &&!empty($_POST['fifthblockIPv6']) && !empty($_POST['sixthblockIPv6']) && !empty($_POST['seventhblockIPv6']) && !empty($_POST['eighthblockIPv6']) && is_numeric($_POST['firstblockIPv6']) && is_numeric($_POST['secondblockIPv6']) && is_numeric($_POST['thirdblockIPv6']) && is_numeric($_POST['fourthblockIPv6']) && is_numeric($_POST['fifthblockIPv6']) && is_numeric($_POST['sixthblockIPv6'])  && is_numeric($_POST['seventhblockIPv6']) && is_numeric($_POST['eighthblockIPv6']))
    {
        $l = new Yaurau_IP_Blocker();
        $l->set = $_POST['firstblockIPv6'] .':'. $_POST['secondblockIPv6'] . ':' .$_POST['thirdblockIPv6'] . ':' . $_POST['fourthblockIPv6']. ':' . $_POST['fifthblockIPv6']. ':' . $_POST['sixthblockIPv6'] . ':' . $_POST['seventhblockIPv6']. ':' . $_POST['eighthblockIPv6'];
        $l->enterIP();
        echo "IP $l->set blocked";
    }
    if(
            $_POST['submitv6'] &&
            (
                    empty($_POST['firstblockIPv6']) || empty($_POST['secondblockIPv6']) || empty($_POST['thirdblockIPv6']) || empty($_POST['fourthblockIPv6']) || empty($_POST['fifthblockIPv6']) || empty($_POST['sixthblockIPv6']) || empty($_POST['seventhblockIPv6']) || empty($_POST['eighthblockIPv6'])

            || !is_numeric($_POST['firstblockIPv6']) || !is_numeric($_POST['secondblockIPv6']) || !is_numeric($_POST['thirdblockIPv6']) || !is_numeric($_POST['fourthblockIPv6']) || !is_numeric($_POST['fifthblockIPv6']) || !is_numeric($_POST['sixthblockIPv6']) || !is_numeric($_POST['seventhblockIPv6']) || !is_numeric($_POST['eighthblockIPv6'])
            )
    ) {
        $IP = $_POST['firstblockIPv6'] .':'. $_POST['secondblockIPv6'] . ':' .$_POST['thirdblockIPv6'] . ':' . $_POST['fourthblockIPv6']. ':' . $_POST['fifthblockIPv6']. ':' . $_POST['sixthblockIPv6'] . ':' . $_POST['seventhblockIPv6']. ':' . $_POST['eighthblockIPv6'];
        echo "Incorrect IP $IP";
    }
    ?>
    <form action="options.php" method="POST">
        <?php
        settings_fields( 'new_option' );     // скрытые защитные поля - nonce
        do_settings_sections( MY_PLAGIN_PAGE ); // секции с настройками (опциями). У нас она всего одна 'section_id'
        submit_button();
        echo get_option('some_other_option');
        ?>
    </form>
</div>







