<?php

use \MyProject1\Model\PositionModel;
use \myLove\Cores\Url;

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
            <?php if ($_SESSION['username'] === 'admin'): ?>
                <th></th>
                <th></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach (PositionModel::getAll() as $aPosition): ?>
            <tr>
                <td class="collapsing">
                    <div class="ui fitted slider checkbox">
                        <input type="checkbox"> <label></label>
                    </div>
                </td>
                <td><?= $aPosition['ID'] ?></td>
                <td><?= $aPosition['namePosition'] ?></td>
                <?php if ($_SESSION['username'] === 'admin'): ?>
                    <td><a href="<?= Url::url('updatePosition') . '/' . $aPosition['ID']; ?>">
                            <div class="ui right floated center small primary  icon button">
                                <i class="edit icon"></i> Edit
                            </div>
                        </a></td>
                    <td><a onclick=" return confirm('Are you sure you want to delete this entry ?')"
                           href="<?= Url::url('deletePosition') . '/' . $aPosition['ID'] ?>">
                            <div class="ui right floated center small primary  icon button">
                                <i class="trash alternate icon"></i> Del
                            </div>
                        </a></td>
                <?php endif; ?>

            </tr>
        <?php endforeach; ?>
        </tbody>
        <?php if($_SESSION['username']==='admin'): ?>
            <tfoot class="full-width">
            <tr>
                <th></th>
                <th colspan="9">
                    <a href="addEmployee">
                        <div class="ui right floated small primary labeled icon button">
                            <i class="user icon"></i> Add
                        </div>
                    </a>
                </th>
            </tr>
            </tfoot>
        <?php endif; ?>

    </table>
</div>
<?php
require_once 'views/view/footer.php';
?>
