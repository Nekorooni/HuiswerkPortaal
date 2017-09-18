<?php
$huiswerk = App::getUser()->getHomework();
?>
<h3>Huiswerk</h3>
<table class="table">
    <thead>
    <tr>
        <th>Id #</th>
        <th>Titel</th>
        <th>Deadline</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($huiswerk as $h){ ?>
        <tr>
            <th scope="row"><?=$h->getId()?></th>
            <td><?=$h->getTitle()?></td>
            <td><?=$h->getDeadline()?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>