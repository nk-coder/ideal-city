<nav class="navbar dark-wrapper inverse-text">
		<div class="container">
			<div class="flex-it">
				<div class="navbar-header">
					<div class="navbar-brand">
						<a href="index.html"><img alt="logo" src="images/logo_white.png"></a>
					</div>
					<div class="nav-bars-wrapper">
						<div class="nav-bars-inner">
							<div class="nav-bars" data-target=".navbar-collapse" data-toggle="collapse">
								<span></span>
							</div>
						</div>
					</div>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Home</a>
						</li>

						<li>
	                     	<?php
		                       	if (isset($_SESSION['email'])) { $username = $_SESSION['username'];?>
		                       		
		                        <a href="Profile.php">My Profile</a>
	                  		<?php }?>
						</li>

						<li>
							<a href="aboutUs.php">About</a>
						</li>

						<li>
							<a href="service.php">Service</a>
						</li>

						<li>
							<a href="submit-post.php">Submit Problem</a>
						</li>

						<li>
							<a href="contact.php">Contact</a>
						</li>

		                <li>
		                    <?php if(isset($_SESSION['email'])) { ?>
		      						<a href="logout.php">Logout</a>
		                    <?php }else {?>
		      						<a href="login.php">Login</a>
		                    <?php } ?>
		                </li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
</body>
</html>
