<!DOCTYPE html>
<html>
	<head>
		<title>Stickers</title>
		<meta charset="UTF-8">
        <style type="text/css">

            .jumbotron, .navbar {
                background-color: white;
                border: 1px solid e7e7e7;
            }
            
            .sort_controls {
                margin: 25px 0px;
                vertical-align:top;
            }
            
            #categories {
                width: 66%;   
                border: 1px solid #E7E7E7;
                border-radius: 5px;
                height: 65px;
                margin-bottom: 20px;
            }
            
            #categories h3 {
                margin: 5px 0px 0px 5px;
                font-size: 16px;
                font-weight: bold;
            }
            
            #categories table {
                margin-top: 10px;
                margin-left: 30px;  
                text-align: center;
            }
            
            #categories td {
                width: 200px;   
            }
            
            #categories a {
                color: #0D3A61  ;
                font-size: 14px;
            }
            
        </style>
	</head>
	<body>     
        <div class="container">
            <?php $this->load->view('partials/nav'); ?>
            <div id="categories">
                <h3>Categories</h3>
                <table>
                    <tr>
                        <td><a href='/products/stickers/seasonal'>Seasonal (2)</a></td>
                        <td><a href='/products/stickers/food'>Food (4)</a></td>
                        <td><a href='/products/stickers/reminders'>Reminders (4)</a></td>
                        <td><a href='/products/stickers/other'>Other (2)</a></td>
                    </tr>
                </table>
            </div>
        
            <div id ="listing_wrapper">    

                <?php $count=0;
                foreach($results as $product){ 
                    if ($count % 2 == 0){ ?>
                        <div class ="row">
                    <?php }  
                        $count ++; ?>
                        <div class="col-md-4">                        
                            <a href="/products/show/<?= $product->id ?>" class="thumbnail">
                        <img src="/assets/images/<?= $product->source ?>" 
                             alt="Kawaii Bag"></a></div>
                        <?php if ($count % 2 == 0){ ?>
                            </div>
                        <?php }
                } ?>
                </div>
            <nav>


        <nav>
            <ul class="pagination">
                <?= $links ?>
            </ul>
                </nav>

        </div> 
    </body>
</html>