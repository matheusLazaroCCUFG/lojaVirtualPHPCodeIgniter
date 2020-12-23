
@extends('viewsStore/principal')
@section('conteudo')

<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div class="main-agileits">
	<div class="form-w3agile form1">


		<?php echo form_open("auth/forgot_password");?>

		<p>
			<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
		</p>

			<div class="text-center">
				<?php getMsg('EmailNaoEncontrado'); ?>
				<br><br><br><h3><strong>Digite seu email para mudar a Senha!</strong></h3><br>
				<!--< ?php echo form_input($identity);?>-->
				<input class="form-control" style="width: 350px; margin-left: auto; margin-right: auto" placeholder="Email" type="text" name="identity" value="" id="identity" required>

				<br><p><button class="btn btn-primary" type="submit" name="submit" value=""><strong>Enviar E-mail de recuperação</strong></button></p>
	</div>
		<?php echo form_close();?>
	</div>
</div>
@stop
