<?php include "inc/header.php";?>
				<section>
				<?php include "chkLogin.php";?>
					<article class="log">
					<?php
						if(isset($_GET['pId'])){
							$pId = $_GET['pId'];
						}
					
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])){
							$res = $reg->updateUserInfo($_POST,$pId);
							if($res){
								echo $res;
							}
						}
					?>
						<div class="login_form">
						<div class="loghead">
							<h2>Profile</h2>
						</div>
							<form action="" method="post">
								<?php
									$getUser = $reg->getUserInfo($pId);
									if($getUser)
										$value = $getUser->fetch_assoc();
								?>
								<div class="row">
									<div class="col-1">Username</div>
									<div class="col-2"><input type="text" value="<?php echo $value['userName'];?>" name="username"/></div>
								</div>
								<div class="row">
									<div class="col-1">Full Name</div>
									<div class="col-2"><input type="text" value="<?php echo $value['fullName'];?>" name="fullName"/></div>
								</div>
								<div class="row">
									<div class="col-1">Email</div>
									<div class="col-2"><input value="<?php echo $value['email'];?>" type="text" name="email"/></div>
								</div>
								<div class="row">
									<div class="col-1">Phone</div>
									<div class="col-2"><input value="<?php echo $value['phone'];?>" type="text" name="phone"/></div>
								</div>
								<div class="row">
									<div class="col-1">Old Password</div>
									<div class="col-2"><input placeholder="To change Password enter old Password" type="password" name="oldPassword"/></div>
								</div>
								<div class="row">
									<div class="col-1">New Password</div>
									<div class="col-2"><input placeholder="Enter new Password" type="password" name="newPassword"/></div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2"><input type="submit" value="Update" name="update"/></div>
								</div>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>