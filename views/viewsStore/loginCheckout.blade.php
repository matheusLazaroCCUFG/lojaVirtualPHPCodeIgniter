
@extends('viewsStore/principal')
@section('conteudo')
	<!--content-->
		<div class="content">
				<!--login-->
			<div class="login">
				<div class="main-agileits">
					<div class="form-w3agile">


						<?php
						/*$CI =& get_instance();
						if($CI->session->flashdata('msgCadastro')){
							echo $CI->session->flashdata('msgCadastro');
						}*/
						//$this->load->helper('helper_helper');

						if(validation_errors()){
							echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
						}
						getMsg('msgCadastro');
						?>


						<!--
						<form action="" method="post">
							<div class="modal-body modal-body-sub_agile">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input  type="text"  name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
								<div class="clearfix"></div>
							</div>
							<div class="modal-body modal-body-sub_agile">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input  type="password"  name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<div class="clearfix"></div>
							</div>

								<input type="checkbox" name="conected"> Manter conectado<br><br>


							<input type="submit" value="Login">
							<input type="submit" value="Sign In">
						</form>
						-->

						<div class="modal-content">

							<div class="modal-body modal-body-sub_agile">
								<div class="col-md-8 modal_body_left modal_body_left1">
									<h3 class="agileinfo_sign">Entrar <span>Agora</span></h3>
									<form action="<?= ($combinar == true ? base_url('checkout/loginCombinar') : base_url('checkout/login')) ?>" method="post">
										<div class="modal-body modal-body-sub_agile">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<input  type="text"  name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
											<div class="clearfix"></div>
										</div>
										<div class="modal-body modal-body-sub_agile">
											<i class="fa fa-lock" aria-hidden="true"></i>
											<input  type="password"  name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
											<div class="clearfix"></div>
										</div>

										<input type="checkbox" name="conected"> Manter conectado<br><br>


										<input type="submit" value="Login">

									</form>

									<div class="clearfix"></div>




								</div>



								<div class="clearfix"></div>
							</div>
							<div class="forg">

									<h4><a href="#">Esqueci a senha</a></h4>
									<br>
									<br>

									<h4><a href="<?= base_url('Cadastrar Cliente') ?>" >Cadastrar-se</a></h4>

								<div class="clearfix"></div>
							</div>

					</div>

					</div>
				</div>
			</div>
				<!--login-->
		</div>
		<!--content-->
		<!---footer--->

@stop
