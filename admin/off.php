<?php include "inc/header.php";?>
				<section>
					<?php include "inc/sidebar.php";?>
					<article>
						<div class="off admin_off">
						<div class="loghead">
							<h2>Off Your Meal</h2>
						</div>
							<form action="" method="post">
								<div class="row">
									<div class="col-1">For</div>
									<div class="col-2">
										<select style="width:94%;" name="name">
											<?php
												$memRes = $mem->getMemberList();
												if($memRes){
													while($vlu = $memRes->fetch_assoc()){
											?>
											<option value="<?php echo $vlu['memName'];?>"><?php echo $vlu['memName'];?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-1">From</div>
									<div class="col-2">
										<input type="date" name="date"/>
										<select>
											<option>Morning</option>
											<option>Noon</option>
											<option>Night</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-1">To</div>
									<div class="col-2">
										<input type="date" name="date" min="2018-01-02"/>
										<select>
											<option>Morning</option>
											<option>Noon</option>
											<option>Night</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-1"></div>
									<div class="col-2"><input type="submit" value="Submit" name="submit"/></div>
								</div>
							</form>
						</div>
					</article>
				</section>
				<?php include "inc/footer.php";?>