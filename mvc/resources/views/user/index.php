<?php
    require_once '../resources/views/assets/header.php';
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User List</h3>
    </div>
    <div>
    <a href="/user/create" class="btn btn-primary btn-lg" role="button">Create User</a>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 80px">ID USER</th>
                    <th>NAME</th>
                    <th>USER NAME</th>
                    <th>EMAIL</th>
                    <th>CREATED BY</th>
                    <th>CREATED ON</th>
                    <th>ACTIONS</th>
                    <th style="width: 40px">Label</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users['data'] as $user): ?>
  
                <tr>
                    <td><?= $user['user_id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['user_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['created_by'] ?></td>
                    <td><?= $user['created_on'] ?></td>
                    <td>
                    <a href="/user/<?= $user['user_id'] ?>" class="btn btn-success btn-lg" role="button">Show</a>
                    <!-- <a href="/user/<?= $user['user_id']?>/delete" class="btn btn-danger btn-lg" role="button">Delete</a> -->
                     </td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-danger">20%</span></td>
                </tr>
                <?php endforeach ?>
                <!-- <tr>
                    <td>2.</td>
                    <td>Clean database</td>
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-warning" style="width: 70%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-warning">70%</span></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Cron job running</td>
                    <td>
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-primary" style="width: 30%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-primary">30%</span></td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Fix and squish bugs</td>
                    <td>
                        <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-success">90%</span></td>
                </tr>-->
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <!-- <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul> -->
    </div> 
</div>
<?php
    require_once '../resources/views/assets/footer.php';
?>