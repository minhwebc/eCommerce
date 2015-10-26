<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">         
        <style type="text/css">
            
            .navbar {
                background-color: white;  
            }
            
            h1 {
                font-size: 150%;
            }

        </style>
	</head>
	<body> 
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>

            <!-- User Table -->
            <h1>All Users</h1>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Join date</th>
                    <th>User Level</th>
                </tr>
                <?php foreach($users as $detail){ ?>
                <tr>
                    <td><?= $detail['id'] ?></td>
                    <td><a href="/users/show/<?= $detail['id'] ?>"><?= $detail['first_name'] . " " . $detail['last_name'] ?></a></td>
                    <td><?= $detail['email'] ?></td>
                    <td><?= date("F jS, Y", strtotime($detail['created_at'])); ?></td>
                    <td><?php if($detail['level'] == 9){ echo "Admin"; } else { echo "Normal"; } ?></td>
                </tr>
                <?php } ?>
            </table>
        </div> 
    </body>
</html>