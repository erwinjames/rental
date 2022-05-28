<?php

function make_query($con)
{


    $query = "SELECT SUM(orders.pid) AS total, tbl_costume.c_image AS image_link, tbl_costume.c_name AS p_name, tbl_costume.c_description AS description, tbl_costume.id AS productID
FROM tbl_costume JOIN orders
ON tbl_costume.id = orders.pid
GROUP BY orders.pid
ORDER BY total DESC
LIMIT 3
	";
    $result = mysqli_query($con,$query);
    return $result;
}
function make_slide_indicators($con)
{
    $output = '';
    $count = 0;
    $result = make_query($con);
    while($row = mysqli_fetch_array($result))
    {
        if($count == 0)
        {
            $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
            ';
        } else {
            $output .= '<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
        }
        $count = $count + 1 ;
    }
    return $output;
}

function make_slides($con)
{
    $output = '';
    $count = 0;
    $result = make_query($con);
    while($row = mysqli_fetch_array($result))
    {
        if($count == 0)
        {
        	$output .= '<div class="carousel-item active">';
        } else {
         $output .= '<div class="carousel-item">';
        }
        $output .= '<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
										<img src="data:image/jpeg;base64,'.base64_encode($row['image_link']).'" width="268px" height="249px" alt="" />
									<h2>'.$row['p_name'].'</h2>
									<p>'.$row['description'].'</p>
									<a href="product_details.php?costId='.$row['productID'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Rent</a>
								</div>
							</div>
						</div>
					</div>
					</div>';
        $count = $count +1;
    }
    return $output;
}
?>


<div class="recommended_items">
	<h2 class="title text-center">most rented custumes</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
				 <?php echo make_slide_indicators($con); ?>
		 </ol>
		<div class="carousel-inner">
			<?php echo make_slides($con); ?>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
