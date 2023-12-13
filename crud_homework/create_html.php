<?php require_once('partial/header.php'); 
require_once('database/database.php');
?>
    <div class="container p-4">
        <form action="./create_model.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name">
                <p name ="name_error"></p>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Age" name="age">
                <p name ="age_error"></p>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <p name ="email_error"></p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Image URL" name="profile">
                <p name ="profile_error"></p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>
        </form>
    </div>
<?php require_once('partial/footer.php'); ?>