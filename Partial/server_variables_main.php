<main>
    <div id="main_head">
        <p>Server Variables:</p>
    </div>
    <div id="main-middle-form" style="overflow:auto">
        <div id="srv-var">
            <table border="1px solid #000;">
                <tr>
                    <th>
                    <p><strong>$_SERVER:</strong></p></th>
                </tr>
                <?php
                foreach ($_SERVER as $key => $var) { ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $var; ?></td>
                </tr>
                <?php
                } ?>
                <tr>
                    <th><p><strong>$_GET:</strong></th>
                </tr>
                <?php
                foreach ($_GET as $key => $var) { ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $var; ?></td>
                </tr>
                <?php
                } ?>
                <tr>
                    <th><p><strong>$_POST:</strong></th>
                </tr>
                <?php
                foreach ($_POST as $key => $var) { ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $var; ?></td>
                </tr>
                <?php
                } ?>
            </table>
        </div>
    </div>
</main>