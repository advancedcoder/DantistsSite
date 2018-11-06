<?php 
$xmlString = file_get_contents("xml/goods.xml");
$xml = new SimpleXMLElement($xmlString);
$i = 1;
?>
<main>
    <div id="main_head">
        <p>Xml parsed:</p>
    </div>
    <div id="main-middle-form" style="overflow:auto">
        <table>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Serial</th>
                <th>Year</th>
                <th>Picture</th>
                <th>Type</th>
                <th>Model</th>
                <th>Company</th>
            </tr>
            <?php 
            foreach($xml as $v) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $v->name; ?></td>
                <td><?php echo $v->price."$"; ?></td>
                <td><?php echo $v->serialNumber; ?></td>
                <td><?php echo $v->year; ?></td>
                <td><img src="<?php echo $v->thumbnail?>" alt="" style="width:38px; height:38px;"></td>
                <td><?php echo $v->type; ?></td>
                <td><?php echo $v->model; ?></td>
                <td><?php echo $v->company; ?></td>
            </tr>
            <?php
                $i++;
            }
            ?>

        </table>
    </div>
</main>