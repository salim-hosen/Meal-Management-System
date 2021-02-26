<?php include "inc/header.php";?>
				<section>
					<?php
						if(Session::get("usrLogin") == true){
							echo "<script>window.location='index.php'</script>";
						}
					?>
					<article class="log">
					<?php
						if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){
							$res = $reg->ifRegistered($_POST);
							if($res){
								echo $res;
							}
						}
					?>
						<div class="login_form">
						<div class="loghead">
							<h2>Login</h2>
						</div>
							<form action="" method="post">								
								<div class="row">
									<div class="col-1">Username</div>
									<div class="col-2"><input type="text" name="username"/></div>
								</div>
								<div class="row">
									<div class="col-1">Password</div>
									<div class="col-2"><input type="password" name="password"/></div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2"><input type="submit" value="Login" name="login"/></div>
								</div>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>