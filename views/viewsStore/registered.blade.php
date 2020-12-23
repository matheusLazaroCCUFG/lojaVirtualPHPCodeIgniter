
@extends('viewsStore/principal')
@section('conteudo')
	<!--content-->
<div class="content">
				<!--login-->

		<div class="main-agileits">
			<div class="form-w3agile form1">


					<?php
						if(validation_errors('<div>', '</div>')){
							echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
						}
						getMsg('msgCadastro');
					?>


						<section class="content-header">
							<h2>
								<?= $titulo; ?>
							</h2>

							<ol class="breadcrumb">
								<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
								<li class="active"><?= $titulo; ?></li>

							</ol>

						</section>



					<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 ">
							<form action="<?= ($registrarAdm == true ? base_url('users') : '') ?>" method="post">
								<div class="key">
									<i class="fa fa-user" aria-hidden="true"></i>
									<input  type="text"  name="Username" value="<?= set_value('Username'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
									<div class="clearfix"></div>
								</div>
								<div class="key">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<input  type="text" name="Email" value="<?= set_value('Email'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" >
									<div class="clearfix"></div>
								</div>
								<div class="key">
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input  type="password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
									<div class="clearfix"></div>
								</div>
								<div class="key">
									<i class="fa fa-lock" aria-hidden="true"></i>
									<input  type="password" name="confirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" >
									<div class="clearfix"></div>
								</div>
								<input type="submit" value="Submit">
							</form>
						</div>
					</div>

			</div>				<!--login-->
		</div>
</div>

		<!--content-->
@stop
