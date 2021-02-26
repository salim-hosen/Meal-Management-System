<?php include "inc/header.php";?>
				<section>
					<article class="log">
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])){
							$res = $reg->insertRegInfo($_POST);
							if($res){
								echo $res;
							}
						}
					?>
						<div class="login_form">
						<div class="loghead">
							<h2>Register</h2>
						</div>
							<form action="" method="post">								
								<div class="row">
									<div class="col-1">Username</div>
									<div class="col-2"><input type="text" name="username"/></div>
								</div>
								<div class="row">
									<div class="col-1">Full Name</div>
									<div class="col-2">
										<select style="width: 102%;border: 1px solid #ccc" name="fullName">
											<option value="">Select Name</option>
											<?php
										$res = $mem->getMemberList();
										if($res){
											while($value = $res->fetch_assoc()){
									?>
											<option value="<?php echo $value['memName'];?>"><?php echo $value['memName'];?></option>
											<?php
											}
										}
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-1">Email</div>
									<div class="col-2"><input type="text" name="email"/></div>
								</div>
								<div class="row">
									<div class="col-1">Phone</div>
									<div class="col-2"><input type="text" name="phone"/></div>
								</div>
								<div class="row">
									<div class="col-1">Password</div>
									<div class="col-2"><input type="password" name="password"/></div>
								</div>
								<div class="row">
									<div class="col-1">Repeat Password</div>
									<div class="col-2"><input type="password" name="repassword"/></div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2"><input type="submit" value="Submit" name="register"/></div>
								</div>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>