<header>
	<div class="header-area ">
	    <div id="sticky-header" class="main-header-area">
	        <div class="container-fluid">
	            <div class="header_bottom_border">
	                <div class="row align-items-center">
	                    <div class="col-7 col-md-2 col-lg-2 col-xl-2">
	                        <div class="logo-img">
	                            <a href="index.php">
	                                <img src="images/logo/kk.png" alt="">
	                            </a>
	                        </div>
	                    </div>
	                    <div class="d-none  col-md-7 d-md-block col-lg-6 col-xl-6">
	                        <div class="main-menu  d-none d-md-block">
	                            <nav>
	                                <ul id="navigation">
	                                    <li><a href="ibyabuze.php"><b>Ibyabuze</b></a></li>
	                                    <li><a class="" href="ibyatoraguwe.php"><b>Ibyatoraguwe</b></a></li>
	                                    <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
	                                        <ul class="submenu">
	                                                <li><a href="destination_details.html">Destinations details</a></li>
	                                                <li><a href="elements.html">elements</a></li>
	                                        </ul>
	                                    </li> -->
	                                    <li class="d-none d-lg-inline"><a href="contact.php"><b>contact</b></a>
	                                    </li>
	                                    <li class="d-none d-lg-inline"><a class="active" href="about.php"><b>About</b></a></li>
	                                    <li><a href="advert_form.php"><b>Ranga</b></a></li>
	                                </ul>
	                            </nav>
	                        </div>
	                    </div>
                        <div class="col-5  col-md-3 col-lg-4 col-xl-4 d-lg-block">
                        	
                            <div class="social_wrap d-flex align-items-center  justify-content-end">
                            	<div class="pr-5 pr-lg-3 pr-xl-5 dropdown">
	                        		<span data-toggle="dropdown"><i class="fa fa-search text-warning mr-5 mr-lg-0" style="font-size: 25px;"></i></span>
	                        		<div class="dropdown-menu p-2  dropdown-menu-right mt-sm-3 mt-lg-4">
	                        			<div class="text-center py-2 px-1">
	                        				<h5 class="text-muted">Koresha Izina, Akarere, Umurenge cg Nimero y'icyangombwa.</h5>
	                        			</div>
	                        			<form method="POST" action="search.php" class="px-2 px-md-3 py-4">
	                        				<div class="input-group">
									          <input type="text" name="property" class="form-control" placeholder="Shakisha hano..">
									          <div class="input-group-append">
									            <button type="submit" class="btn px-4" name="search"><i class="fa fa-arrow-right text-dark"></i></button>
									          </div>
									        </div>
	                        			</form>
	                        		</div>
	                        	</div>
                                <div class="number d-none d-lg-block">
                                    <div class="hib-icon">
										<img src="images/icons/map-marker.png" alt="" class="">
									</div>
									<div class="hib-text">
										<h6>Musanze-Rubavu road</h6>
										<p class="text-muted">IN INES-Ruhengeri</p>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="seach_icon">
                            <a data-toggle="modal" data-target="#exampleModalCenter" href="">
                                <!-- <i class="fa fa-search"></i> -->
                                <i class="px-1"><small><b class="text-centur">Ibyo Washyizeho</b></small></i>
                            </a>
                        </div>
                        <!-- <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Search model -->
	<div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered" role="document">
	      <div class="modal-content">
	        <div class="serch_form">
	            <form method="POST" action="backend/checkpropertystatus.php">
					<div class="container">
						<div class="">
							<div class="mt-3">
								<label class="text-info"><h5 class="text-century"><i><strong>Andika code wahawe nyuma yogutanga itangazo.</strong></i></h5></label>
								<label class="text-century text-secondary mt-3"><b>Umubare wahawe</b></label>
								<div class="input-group mt-1">
								  <input type="text" name="code" class="form-control" placeholder="Andika code (34)">
								</div>														
							</div>
							<div class="mt-3">
								<label class="text-century text-secondary"><b>Nimero ya telefone wakoresheje</b></label>
								<div class="input-group mt-1">
									<input type="text" name="phone" class="form-control" placeholder="andika nimero ya telefone">
								</div>												
							</div>
						</div>
						<div class="form-submit text-center my-4">
							<button name="checkproperty" class="btn btn-primary rounded btn-lg btn-block px-2 py-1"><b>Emeza</b></button>
						</div>
					</div>
				</form>
	        </div>
	      </div>
	    </div>
    </div>
	<!-- Search model end -->
</header>
	<!-- Header section end  -->