
<div class="row isotope-grid">
				<?php
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$name = $row['name'];
						$category = $row['category'];
						$image_url = $row['image_url'];
						$price = number_format($row['price'], 2, ',', '.');
						$detail_url = $row['detail_url'];
						$quick_view_url = $row['quick_view_url'];
			
						echo "
						<div class=\"col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item $category\">
							<div class=\"block2\">
								<div class=\"block2-pic hov-img0\">
									<img src=\"$image_url\" alt=\"IMG-PRODUCT\">
									<a href=\"$quick_view_url\" class=\"block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1\">
										Quick View
									</a>
								</div>
								<div class=\"block2-txt flex-w flex-t p-t-14\">
									<div class=\"block2-txt-child1 flex-col-l\">
										<a href=\"$detail_url\" class=\"stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6\">
											$name
										</a>
										<span class=\"stext-105 cl3\">
											Rp. $price
										</span>
									</div>
									<div class=\"block2-txt-child2 flex-r p-t-3\">
										<a href=\"#\" class=\"btn-addwish-b2 dis-block pos-relative js-addwish-b2\">
											<img class=\"icon-heart1 dis-block trans-04\" src=\"images/icons/icon-heart-01.png\" alt=\"ICON\">
											<img class=\"icon-heart2 dis-block trans-04 ab-t-l\" src=\"images/icons/icon-heart-02.png\" alt=\"ICON\">
										</a>
									</div>
								</div>
							</div>
						</div>";
					}
				} else {
					echo "0 hasil";
				}
				$conn->close();
				?>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/30-removebg-preview 1.png">
										<div class="wrap-pic-w pos-relative">
											<img src="images/30-removebg-preview 1.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/Screenshot_2024-08-19_111354-removebg-preview.png">
										<div class="wrap-pic-w pos-relative">
											<img src="images/Screenshot_2024-08-19_111354-removebg-preview.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/Screenshot_2024-08-19_111416-removebg-preview.png">
										<div class="wrap-pic-w pos-relative">
											<img src="images/Screenshot_2024-08-19_111416-removebg-preview.png" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								celana WDWIN Slimfit Jeans
							</h4>

							<span class="mtext-106 cl2">
								Rp. 200.000,00
							</span>

							
							
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										ukuran
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>pilih opsi</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								
								
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
							</div>
