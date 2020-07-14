<?php

use \MyProject1\Model\EmployeeModel;
use \MyProject1\Cores\Url;

require_once 'views/view/header.php';
require_once 'views/view/navigation.php';
?>
<div class="ui segment" id="home">
    <table class="ui compact celled definition table">
        <thead class="full-width">
        <tr>
            <th></th>
            <th>STT</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Create Date</th>
<!--            <th>Position</th>-->
            <?php /*if ($_SESSION['username'] === 'admin'): */?>
                <th></th>
                <th></th>
<!--            --><?php //endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach (EmployeeModel::getAll() as $aEmployee):?>
            <tr>
                <td class="collapsing">
                    <div class="ui fitted slider checkbox">
                        <input type="checkbox"> <label></label>
                    </div>
                </td>
                <td><?= $aEmployee['ID'] ?></td>
                <td><?= $aEmployee['name'] ?></td>
                <td><?= $aEmployee['address'] ?></td>
                <td><?= $aEmployee['email'] ?></td>
                <td><?= $aEmployee['phone'] ?></td>
                <td><?php echo "<img src='{$aEmployee['image']}' width='45px' height='45px'>" ?></td>
                <td><?= $aEmployee['create_date'] ?></td>
<!--                <td>--><?//= $aEmployee['namePosition'] ?><!--</td>-->
<!--                --><?php //if ($_SESSION['username'] === 'admin'): ?>
                    <td><a href="<?= Url::url('update-employee') . '/' . $aEmployee['ID']; ?>">
                            <div class="ui right floated center small primary  icon button">
                                <i class="edit icon"></i> Edit
                            </div>
                        </a></td>
                    <td><a onclick=" return confirm('Are you sure you want to delete this entry ?')"
                           href="<?= Url::url('delete-employee') . '/' . $aEmployee['ID'] ?>">
                            <div class="ui right floated center small primary  icon button">
                                <i class="trash alternate icon"></i> Del
                            </div>
                        </a></td>
<!--                --><?php //endif; ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
<!--        --><?php //if($_SESSION['username']==='admin'): ?>
            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="9">
                    <a href="add-employee">
                        <div class="ui right floated small primary labeled icon button">
                            <i class="user icon"></i> Add
                        </div>
                    </a>
                </th>
            </tr>
            </tfoot>
<!--        --><?php //endif; ?>

    </table>
</div>
<?php
require_once 'views/view/footer.php';
?>
