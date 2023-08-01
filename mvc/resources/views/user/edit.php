<?php
//  require_once("../resources/assets/header.php");
require_once '../resources/views/assets/header.php';
?>

<div class="col-md-12">

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Register User</h3>
    </div>

    <form action="/user/<?= $user["user_id"]?>" method="post">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 ">
            <label for="lblname">Name</label>
            <input type="text" value="<?= $user["name"] ?>" class="form-control" id="txtName" name="txtName" placeholder="name">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <label for="lblUsername">User name</label>
            <input type="text" value="<?= $user["user_name"] ?>" class="form-control" id="txtUsername" name ="txtUsername" placeholder="user name">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <label for="lblEmail">Email address</label>
            <input type="email" value="<?= $user["email"] ?>" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter email">
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <label for="lblPassword">Password</label>
            <input type="password" value="<?= $user["password"] ?>" class="form-control" id="txtPassword" name ="txtPassword" placeholder="Password">
          </div>
          <!-- <div class="col-lg-4 col-md-6 col-sm-12">
            <label for="lblConfirmPassword">Password</label>
            <input type="password" value="<?= $user["name"] ?>" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password">
          </div> -->
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
        <!-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
      </div>

      <div class="card-footer">
      <div class="col-lg-4 col-md-6 col-sm-12 text-right">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </div>
    </form>
  </div>
</div>

 

<?php
require_once '../resources/views/assets/footer.php';
?>