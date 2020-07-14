<?php
use \MyProject1\Cores\Url;
use \MyProject1\Model\EmployeeModel;
use MyProject1\Cores\Session;

require_once 'views/view/header.php';
require_once 'views/view/navigation.php';
$route = explode('/',$_GET['route']);
$aEmployee = EmployeeModel::getEmployeeById($route[1]);
?>
    <h4 id="home">UPDATE EMPLOYEE</h4>
    <br>
    <div class="ui segment" id="home">
        <form class="ui form" method="post" action="<?= Url::url('update-employee').'/'.$aEmployee['ID']; ?>" enctype="multipart/form-data">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="<?= $aEmployee['name']; ?>" required>
            </div>
            <div class="field">
                <label>Address</label>
                <input type="text" name="address" value="<?= $aEmployee['address']; ?>" required>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" value="<?= $aEmployee['email']; ?>" required>
            </div>
            <div class="field">
                <label>Phone</label>
                <input type="text" name="phone" value="<?= $aEmployee['phone']; ?>" required>
            </div>
            <div class="field">
                <label>Image</label>
                <input type="file" name="image" value="<?= $aEmployee['image']; ?>">
            </div>
            <div  id="home">
                <?= isset($_SESSION['error'])?$_SESSION['error']: ''; ?>
            </div>
            <button onclick=" return confirm('Are you sure you want to save this entry ?')" class="ui button" type="submit">Save</button>
            <a  href="<?= Url::url('employee'); ?>" class="ui button" type="submit">Back</a>
        </form>
        <br>
        <div>
            <?= Session::get('error-employee') ;?>
        </div>
    </div>


<?php
require_once 'views/view/footer.php';
?>