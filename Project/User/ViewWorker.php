<?php
include('../Assests/Connection/Connection.php');
include('Header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Card View</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-header {
            background: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .card-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card-body p {
            margin: 5px 0;
        }

        .card-footer {
            background: #f8f9fa;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        .card-footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    
    <div class="card-container">
        <?php
        $selqry = "SELECT * FROM tbl_worker w 
                   INNER JOIN tbl_place p ON w.place_id = p.place_id 
                   INNER JOIN tbl_district d ON p.district_id = d.district_id";
        $worker = $con->query($selqry);
        while ($data = $worker->fetch_assoc()) {
        ?>
        <div class="card">
            <div class="card-header">
                <!-- Display the worker's photo -->
                <img src="../Assests/Files/Worker/Photo/<?php echo $data['worker_photo']; ?>" alt="Photo of <?php echo $data['worker_name']; ?>">
                <h3><?php echo $data['worker_name']; ?></h3>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> <?php echo $data['worker_email']; ?></p>
                <p><strong>District:</strong> <?php echo $data['district_name']; ?></p>
                <p><strong>Place:</strong> <?php echo $data['place_name']; ?></p>
                <p><strong>Address:</strong> <?php echo $data['worker_address']; ?></p>
                <?php
										
											
                                        $average_rating = 0;
                                        $total_review = 0;
                                        $five_star_review = 0;
                                        $four_star_review = 0;
                                        $three_star_review = 0;
                                        $two_star_review = 0;
                                        $one_star_review = 0;
                                        $total_user_rating = 0;
                                        $review_content = array();
                                    
                                        $query = "SELECT * FROM tbl_review where worker_id = '".$data["worker_id"]."' ORDER BY review_id DESC";
                                    
                                        $result = $con->query($query);
                                    
                                        while($row = $result->fetch_assoc())
                                        {
                                            
                                    
                                            if($row["user_rating"] == '5')
                                            {
                                                $five_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '4')
                                            {
                                                $four_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '3')
                                            {
                                                $three_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '2')
                                            {
                                                $two_star_review++;
                                            }
                                    
                                            if($row["user_rating"] == '1')
                                            {
                                                $one_star_review++;
                                            }
                                    
                                            $total_review++;
                                    
                                            $total_user_rating = $total_user_rating + $row["user_rating"];
                                    
                                        }
                                        
                                        
                                        if($total_review==0 || $total_user_rating==0 )
                                        {
                                            $average_rating = 0 ; 			
                                        }
                                        else
                                        {
                                            $average_rating = $total_user_rating / $total_review;
                                        }
                                        
                                        ?>
                                        <p align="center" style="color:#F96;font-size:20px">
                                       <?php
                                       if($average_rating==5 || $average_rating==4.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                           <?php
                                       }
                                       if($average_rating==4 || $average_rating==3.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==3 || $average_rating==2.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==2 || $average_rating==1.5)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==1)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       if($average_rating==0)
                                       {
                                           ?>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                            <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                           <?php
                                       }
                                       ?>
                                       
                                    </p>
                                        <?php
                                    
                                        $output = array(
                                            'average_rating'	=>	number_format($average_rating, 1),
                                            'total_review'		=>	$total_review,
                                            'five_star_review'	=>	$five_star_review,
                                            'four_star_review'	=>	$four_star_review,
                                            'three_star_review'	=>	$three_star_review,
                                            'two_star_review'	=>	$two_star_review,
                                            'one_star_review'	=>	$one_star_review,
                                            'review_data'		=>	$review_content
                                        );
                                        ?>
            </div>
            <div class="card-footer">
                <!-- <p>Serial No: <?php echo $data['worker_id']; ?></p> -->
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
include('Footer.php');
?>

