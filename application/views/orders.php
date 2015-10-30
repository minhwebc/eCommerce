<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>All Orders</title>
        <?php $this->load->view('partials/meta'); ?>
        <script>
            $( document ).ready(function() {
                
                $("select").change(function(){                 
                    $(this).parent().children().last().val($(this).val());
                    $(this).parent().submit();
                });
                
                $("#search").change(function(){                 
                    $(this).parent().children().last().val($(this).val());
                    $(this).parent().submit();
                });
                
            });
        </script>      
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
            <?php $this->load->view('partials/nav-admin'); ?>

            <!-- Order Table -->
            <h1>Orders</h1>
            <form action='/dashboard/update_search' method='post'>
                <select id="search" name="search">
                    <option <?php if( $status == 'all') echo "selected = 'selected'";?>value="show_all"> Show All 
                    </option>
                    <option <?php if ($status == 'shipped') echo "selected = 'selected'";?>value="shipped"> Shipped 
                    </option>
                    <option <?php if ($status == 'cancelled') echo "selected = 'selected'";?>value="cancelled"> Cancelled 
                    </option>
                    <option <?php if ($status == 'process') echo "selected = 'selected'";?>value="process"> Order in Process 
                    </option>
                </select>
            </form>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Billing Address</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
                <?php foreach($results as $order){ ?>
                    <tr>
                        <td><a href="/orders/show/<?= $order->id?>"><?= $order->id?></a></td>
                        <td><?= $order->first_name . " " . $order->last_name ?></a></td>
                        <td><?= (date('m/j/o', strtotime($order->created_at))) ?></td>
                        <td><?= $order->address ?></td>
                        <td><?= $order->total ?></td>
                        <td><form action='/orders/update_status' method='post'>
                            <input type="hidden" name="order_id" value="<?= $order->id ?>">
                            <select class="<?= $order->status ?>" name="status">
                                <option <?php if($order->status == 'Order in process'){
                                        echo "selected = 'selected'"; } ?> value="process">Processing</option>
                                <option <?php if($order->status == 'shipped'){
                                        echo "selected = 'selected'"; } ?> value="shipped">Shipped</option>
                                <option <?php if($order->status == 'cancelled'){
                                        echo "selected = 'selected'"; } ?> value="cancelled">Cancelled</option
                            </select>
                            <input type='hidden' name='status' value=<?= $status?>>
                        </form></td>
                    </tr>
                <?php } ?>
            </table>
            <nav>
                <ul class="pagination">
                    <?= $links ?>
                </ul>
            </nav>
        </div> 
    </body>
</html>