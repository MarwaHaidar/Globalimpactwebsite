<?php
include '../connDatabase/Connection.php';
?>  

<!DOCTYPE html>

<html lang="zxx">


<head>
	<meta charset="utf-8" />
	<title>Lander - Product Offer Landing Page HTML Template</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Lander" />
	<meta name="keywords" content="Lander" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->
	<link rel="stylesheet" type="text/css" href="css/animate.css" />   <!-- for animated cards in header -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="css/flaticon.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="images/header/favicon.png" />
<script src='../../../../google_analytics_auto.js'></script></head>

<body id="MarkertDarkmOdeId">
	<div id="main-content" >
	<!-- Top Scroll Start -->	<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
	<!-- Top Scroll End -->
	<div id="home" class="width_calc">
		<!--try top banner main wrapper Start-->
		<div class="try_top_banner_wrapper" id="MarketDarkHeader"  >
			<div class="try_top_side_img">
				<img src="images/header/banner_side.png" alt="side_img">
			</div>
			<div class="try_circle_first hidden-xs hidden-sm">
				<img src="images/header/right_cycle1.png" alt="circle">
			</div>
			<div class="try_circle_second hidden-xs hidden-sm">
				<img src="images/header/right_cycle2.png" alt="circle">
			</div>
			<div class="container">


				<div class="theme-switch" style="display: none;">
					<label class="switch">
						<input type="checkbox">
						<span class="slider round"></span>
					</label>
				</div>


				
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
						<div class="try_logo_wrapper try_logo_wrapper_top market-div">
							<a href="./MarketPlace.php" class="market">
								<i class="fa-solid fa-shop market-icon "></i> &nbsp;Market Place
							</a>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
						<div class="try_top_login_wrapper btn-header" >
							<button class="home-page" id="HomePageMarketPlace" ><i class="fa-solid fa-house house-icon"></i> &nbsp;Home Page</button>
							<button id="upload-post" class="upload-post">upload post</button>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="slider-area">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<div class="carousel-captions caption-1">
											<div class="container">
												<div class="row">
													<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 hot_slider_custom_col_img_cont">
														<div class="content lr_banner_content_inner_wrapper">
															<div id="clockdiv" data-animation="animated flipInY">
																<div class="text-in-blue-rect">Find All</div>
																<div class="text-in-blue-rect">What You Need</div>
																<div class="text-in-blue-rect">In Your Market Place</div>
																<div class="text-in-blue-rect"> Page</div>
															</div>
															<h3 data-animation="animated fadeInLeft" class="fadeinleftt" style="color: #0099ff !important;" >New earphones @ $99</h3>
															<ul class="try_slider_list">
																<li data-animation="animated fadeInLeft" ><a href="#" style="color: #0099ff !important;">Heigh-Fideliy Sound</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Noise-Canceling Technology</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Wireless Connectivity</a>
																</li>
															</ul>
															<ul class="try_slider_btn">
																<li data-animation="animated fadeInLeft"><a href="#" >Discover More</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" >More Details</a>
																</li>
															</ul>
															<div class="clear"></div>
														</div>
													</div>
													<div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
														<div class="try_slider_img_Wrapper try_slider_img_header_Wrapper" data-animation="animated bounceInUp">
															<img src="images/header/mobail.png" alt="mobail">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class=" carousel-captions caption-2">
											<div class="container">
												<div class="row">
													<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 hot_slider_custom_col_img_cont">
														<div class="content lr_banner_content_inner_wrapper">
															<div id="clockdiv2" data-animation="animated flipInY">
																	<div class="text-in-blue-rect">Find All</div>
																	<div class="text-in-blue-rect">What You Need</div>
																	<div class="text-in-blue-rect">In Your Market Place</div>
																	<div class="text-in-blue-rect"> Page</div>
															</div>
															<h3 data-animation="animated fadeInLeft" style="color: #0099ff !important;">Latest Car Model Strating  @ $29,999</h3>
															<ul class="try_slider_list">
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Aerodynamic Design</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Safety Features</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Efficient Fuel Economy</a>
																</li>
															</ul>
															<ul class="try_slider_btn">
																<li data-animation="animated fadeInLeft"><a href="#">Discover More</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#">More Details</a>
																</li>
															</ul>
															<div class="clear"></div>
														</div>
													</div>
													<div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
														<div class="try_slider_img_Wrapper try_slider_img_header_Wrapper" data-animation="animated bounceInUp">
															<img src="images/header/car-removebg-preview.png" alt="mobail" class="car-image">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="carousel-captions caption-3">
											<div class="container">
												<div class="row">
													<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12 hot_slider_custom_col_img_cont">
														<div class="content lr_banner_content_inner_wrapper">
															<div id="clockdiv3" data-animation="animated flipInY">
																	<div class="text-in-blue-rect">Find All</div>
																	<div class="text-in-blue-rect">What You Need</div>
																	<div class="text-in-blue-rect">In Your Market Place</div>
																	<div class="text-in-blue-rect"> Page</div>
															</div>
															<h3 data-animation="animated fadeInLeft" style="color: #0099ff !important;">Used Like New Phone @ $199</h3>
															<ul class="try_slider_list">
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">AI Dual Camera System</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">Octa-core Processor</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#" style="color: #0099ff !important;">6GB RAM</a>
																</li>
															</ul>
															<ul class="try_slider_btn">
																<li data-animation="animated fadeInLeft"><a href="#">Discover More</a>
																</li>
																<li data-animation="animated fadeInLeft"><a href="#">More Details</a>
																</li>
															</ul>
															<div class="clear"></div>
														</div>
													</div>
													<div class="col-lg-4 col-md-6 col-sm-6 col-xs-8">
														<div class="try_slider_img_Wrapper try_slider_img_header_Wrapper" data-animation="animated bounceInUp">
															<img src="images/header/phone2.png" alt="mobail" class="phone">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="number"></span>
										</li>
										<li data-target="#carousel-example-generic" data-slide-to="1" class=""><span class="number"></span>
										</li>
										<li data-target="#carousel-example-generic" data-slide-to="2" class=""><span class="number"></span>
										</li>
									</ol>
									<div class="carousel-nevigation">
										<a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">	<i class="fa fa-angle-left"></i>
										</a>
										<a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!--try lt st section Start-->
					<?php
			$sqlSelectItem = "SELECT marketplace.* 
			FROM marketplace
			ORDER BY marketplace.created_at DESC";

			$resultVariableItem = mysqli_query($conn, $sqlSelectItem);
			$usersVariableItem = mysqli_fetch_all($resultVariableItem, MYSQLI_ASSOC);
			//  print_r($usersVariableItem);   

			?>

<div id="mobile" class="width_calc">
    <!--try Slider banner Start-->
    <div class="try_banner_slider_wrapper">
        <div class="try_banner_slider_inner_wrapper">
            <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <!-- carousel -->
                    <?php
                    $active = true; // Set the first item as active
                    foreach ($usersVariableItem as $Itemcarousel):
                    ?>
                    <div class="item <?php echo $active ? 'active' : ''; ?>">
                        <div class="carousel-captions caption-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-sm-5 col-xs-8">
                                        <div class="try_slider_img_Wrapper try_mob_slider_img_Wrapper" data-animation="animated bounceInUp">
											<?php
											// Cloudinary cloud name
											$cloudinaryItemcarousel = 'dbete4djx';
											$imageNameItemcarousel = $Itemcarousel['ImageItem'];
											$imageUrlItemcarousel = "https://res.cloudinary.com/{$cloudinaryItemcarousel}/image/upload/{$imageNameItemcarousel}.jpg";
											?>
                                            <img src="<?php echo $imageUrlItemcarousel; ?>" alt="<?php echo $Itemcarousel['item_name']; ?>" class="product1Carousel">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-7 col-xs-12">
                                        <div class="content try_slider_banner_cont">
                                            <h2 data-animation="animated fadeInUp" style="color: black;"><?php echo $Itemcarousel['item_name']; ?></h2>
                                            <p data-animation="animated fadeInUp" style="color: black"><?php echo $Itemcarousel['description']; ?></p>
                                            <p data-animation="animated fadeInUp" style="color: black">Price:$ <?php echo $Itemcarousel['price']; ?></p>
                                            <p data-animation="animated fadeInUp" style="color: black">For Contact: <?php echo $Itemcarousel['Email']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $active = false; // Remove active class from subsequent items
                    endforeach;
                    ?>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <?php
                foreach ($usersVariableItem as $key => $Itemcarousel):
                ?>
                <li data-target="#carousel-example-generic2" data-slide-to="<?php echo $key; ?>" class="<?php echo $key === 0 ? 'active' : ''; ?>"><span class="number"></span></li>
                <?php endforeach; ?>
            </ol>
            <!-- Carousel Navigation -->
            <div class="carousel-nevigation">
                <a class="prev" href="#carousel-example-generic2" role="button" data-slide="prev"><i class="flaticon-left-arrow"></i></a>
                <a class="next" href="#carousel-example-generic2" role="button" data-slide="next"><i class="flaticon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</div>


						<!-------->
						<!-- <div class="item">
							<div class=" carousel-captions caption-2">
								<div class="container">
									<div class="row">
										<div class="col-lg-5 col-md-6 col-sm-5 col-xs-8">
											<div class="try_slider_img_Wrapper try_mob_slider_img_Wrapper" data-animation="animated bounceInUp">
												<img src="images/content/watch_img.png" alt="mobail" class="product1Carousel">
											</div>
										</div>
										<div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-7 col-xs-12">
											<div class="content try_slider_banner_cont">
												
												<h2 data-animation="animated fadeInUp" style="color: black">Watch SE GPS</h2>
												<p data-animation="animated fadeInUp" style="color: black">
													40mm Midnight Aluminium Case with Midnight Sport Band Regular
													
												</p>
												<p data-animation="animated fadeInUp" style="color: black">Price : $300.00</p>	
												<p data-animation="animated fadeInUp" style="color: black">  For Contact : example@gmail.com</p> </p>	
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="item">
							<div class="carousel-captions caption-3">
								<div class="container">
									<div class="row">
										<div class="col-lg-5 col-md-6 col-sm-5 col-xs-8">
											<div class="try_slider_img_Wrapper try_mob_slider_img_Wrapper" data-animation="animated bounceInUp">
												<img src="images/content/banner_mob1.png" alt="mobail">
											</div>
										</div>
										<div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-7 col-xs-12">
											<div class="content try_slider_banner_cont">
												<h3 data-animation="animated fadeInUp" style="color: black">(Dual Camera Phone)</h3>
												<h2 data-animation="animated fadeInUp" style="color: black">iPhone 8 Plus</h2>
												<ul data-animation="animated fadeInUp" style="color: black">
													<li><span class="try_banner_detail_left_part" style="color: black">- Perf.</span>  <span class="try_banner_detail_right_part" style="color: black">Hexa Core</span>
													</li>
													<li><span class="try_banner_detail_left_part" style="color: black">- Display</span>  <span class="try_banner_detail_right_part" style="color: black">5.5" (13.97 cm)</span>
													</li>
													<li><span class="try_banner_detail_left_part" style="color: black">- Storage</span>  <span class="try_banner_detail_right_part" style="color: black">256 GB</span>
													</li>
													<li><span class="try_banner_detail_left_part" style="color: black">- Camera</span>  <span class="try_banner_detail_right_part" style="color: black">12 MP + 12MP</span>
													</li>
													<li><span class="try_banner_detail_left_part" style="color: black">- Battery</span>  <span class="try_banner_detail_right_part" style="color: black">2675 mAh</span>
													</li>
													<li><span class="try_banner_detail_left_part" style="color: black">- Ram</span>  <span class="try_banner_detail_right_part" style="color: black">3 GB</span>
													</li>
												</ul>
												<p data-animation="animated fadeInUp" style="color: black">Price : $1168.00</p>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					
			
	


	<!-- -----------------------------------display items--------------------------------------------------- -->
		<div class="try_lt_st_main_wrapper">
			<div class="container">
			<?php foreach ($usersVariableItem as $Item): ?>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="try_rc_mob_box_wrapper try_lt_st_main_box_wrapper">
							<div class="try_rc_mob_img">

							<?php
                            // Cloudinary cloud name
                                $cloudinaryItem = 'dbete4djx';
                                $imageNameItem = $Item['ImageItem'];
                                $imageUrlItem = "https://res.cloudinary.com/{$cloudinaryItem}/image/upload/{$imageNameItem}.jpg";
                                ?>
								<img src="<?php echo  $imageUrlItem ?>" alt="mobail" class="photos">
							</div>
							<div class="try_rc_mob_img_cont">
								<h1><?php echo $Item['item_name']?></h1>
								<h3><?php echo $Item['description']?></h3>
							</div>
							<div class="try_rc_mob_img_cont_bottom">
								<p>$<?php echo $Item['price']?></p>
								<div class="mail-form">
									<div class="mail">Contact Us: <a href="<?php echo $Item['Email']?>" class="email"><?php echo $Item['Email']?></a></div>
								</div>
								
							</div>
						</div>
					</div>
	<?php endforeach; ?>
					


				</div>
			</div>
		</div>
	</div>

	</div>

	

	<?php

require '../vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;

$Marketuser_id = 2; // user_id get from session
$nameItem = isset($_POST['nameItem']) ? $_POST['nameItem'] : '';
$descriptionItem = isset($_POST['descriptionItem']) ? $_POST['descriptionItem'] : '';
$priceItem = isset($_POST['priceItem']) ? $_POST['priceItem'] : '';
$EmailItem = isset($_POST['EmailItem']) ? $_POST['EmailItem'] : '';
$InputImage = $_FILES['imageItem']['tmp_name'] ?? '';

$MarketerrosVariables = [
    '$nameItemError' => '',
    '$descriptionItemError' => '',
    '$priceItemError' => '',
    '$EmailItemError' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['closeButton'])) {

    if (empty($nameItem)) {
        $MarketerrosVariables['$nameItemError'] = 'insert name';
    }
    if (empty($descriptionItem)) {
        $MarketerrosVariables['$descriptionItemError'] = 'insert description';
    }
    if (empty($priceItem)) {
        $MarketerrosVariables['$priceItemError'] = 'insert price';
    }
    if (empty($EmailItem)) {
        $MarketerrosVariables['$EmailItemError'] = 'insert email';
    }

    if (!array_filter($MarketerrosVariables)) {

        if (!empty($InputImage)) {
            Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
            $result = (new UploadApi())->upload($InputImage);

            $sql = "INSERT INTO marketplace(user_id,item_name,description,price,Email,ImageItem) VALUES (?, ?, ?,?, ?, ?)";
            $stmt = $conn->prepare($sql);

            // Check if the statement was prepared successfully
            if ($stmt) {
                $stmt->bind_param("isssss", $Marketuser_id, $nameItem, $descriptionItem, $priceItem, $EmailItem, $result['public_id']);
                $stmt->execute();

                // Check if the execution was successful
                if ($stmt->affected_rows > 0) {
                    // Data inserted successfully
                    echo json_encode(["message" => "Data inserted successfully"]);
                } else {
                    // Failed to insert data
                    echo json_encode(["message" => "Failed to insert data", "error" => $stmt->error]);
                }

                // Close the statement
                $stmt->close();
            } else {
                // Failed to prepare the statement
                echo json_encode(["message" => "Failed to prepare statement", "error" => $conn->error]);
            }
        }
    }
}

?>


<form action="MarketPlace.php" method="POST" enctype="multipart/form-data">

    <div class="edit-post-overlay" id="edit-post-overlay">
        <!-- Content of the overlay -->
        <div class="edit-post-card">
            <div class="edit-post-overlay-header">
                <div class="edit-post-text">Upload Product Or Service</div>
                <img id="x-edit-post" loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/3ef8b404-e0f7-46ba-9dc3-4941bda62cb2?"
                    class="x-img" />
            </div>
            <div><hr class="hr"></div>
            <div class="text-flex">
                <input type="text" name="nameItem" class="text-input" placeholder="Name Of Item">
                <input type="text" name="descriptionItem" class="text-input" placeholder="Description...">
                <input type="text" name="priceItem" class="text-input" placeholder="Price...">
                <input type="text" name="EmailItem" class="text-input" placeholder="Email Address...">
            </div>

            <label for="image" style="margin-top: 3%;">Upload an image for your product:</label>
            <input type="file" name="imageItem" accept="image/*" onchange="previewImage()">
            <img id="preview" src="#" alt="Preview" class="edit-post-photo">
            <button class="custom-btn-post save-edit-post" name="closeButton" type="submit">Upload</button>
        </div>
    </div>
</form>




	<!--try lt st section End-->
	<script src="js/jquery_min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/pagenav.js"></script>
	<script src="js/custom.js"></script>
	<!--main js file end-->

	<script>
        document.getElementById('upload-post').addEventListener('click', function() {
       document.getElementById('edit-post-overlay').style.display = 'block';
       document.querySelector('.main-content').classList.add('blurred');
     });
     

     document.getElementById('x-edit-post').addEventListener('click', function() {
		console.log("hello");
       document.getElementById('edit-post-overlay').style.display = 'none';
       document.querySelector('.main-content').classList.remove('blurred');
     });
   
     // Open overlay
   document.body.classList.add('overlay-open');
   
   // Close overlay
   document.body.classList.remove('overlay-open');
    </script>

	<!--show image-->
	<script>
        function previewImage() {
            var input = document.getElementById('image');
            var preview = document.getElementById('preview');

            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
			

            reader.readAsDataURL(input.files[0]);
        }
    </script>

</body>

<script>
	
	document.getElementById('HomePageMarketPlace').addEventListener('click', function(){
  window.location.href = '../index.html';
});
</script>
<script>
	
	document.getElementById('HomePageMarketPlace').addEventListener('click', function(){
  window.location.href = '../index.html';
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const MarketDarkHeader = document.getElementById('MarketDarkHeader');

    // Check for saved dark mode preference
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        body.classList.add(currentTheme);
        if (currentTheme === 'dark-mode') {
            toggleSwitch.checked = true;
            enableDarkMode();
        } else {
            enableLightMode();
        }
    }

    // Toggle dark mode
    toggleSwitch.addEventListener('change', function () {
        if (this.checked) {
            body.classList.replace('light-mode', 'dark-mode');
            localStorage.setItem('theme', 'dark-mode');
            enableDarkMode();
        } else {
            body.classList.replace('dark-mode', 'light-mode');
            localStorage.setItem('theme', 'light-mode');
            enableLightMode();
        }
    });

    function enableDarkMode() {
        // Add or remove classes for dark mode
        MarketDarkHeader.classList.add('dark-mode-background');
        MarketDarkHeader.classList.remove('light-mode-background');

        // Adjust body's background color for dark mode
        body.style.background = '#191C24';
        document.documentElement.style.background = '#191C24';
		MarketDarkHeader.style.background = '#0b0c10';
    }

    function enableLightMode() {
        // Add or remove classes for light mode
        MarketDarkHeader.classList.add('light-mode-background');
        MarketDarkHeader.classList.remove('dark-mode-background');

        // Adjust body's background color for light mode
        body.style.backgroundColor = 'white';
        document.documentElement.style.backgroundColor = 'white';
		MarketDarkHeader.style.backgroundColor = 'white';
    }
});


</script>
</html>