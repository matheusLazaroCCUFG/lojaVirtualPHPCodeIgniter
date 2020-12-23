
@extends('viewsStore/principal')
@section('conteudo')

	<h1><?php echo lang('reset_password_heading');?></h1>
	<?php if($message): ?>
		<div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
	<?php endif; ?>
	<!--< ?php echo form_open('auth/reset_password/' . $code);?>-->
	<form action="<?= base_url("auth/reset_password/" . $code)?>" method="post" >
		<div class="text-center">
			<br><br><br><h3><strong>Digite sua nova Senha!<br><h5>(8 a 20 caracteres)</h5></strong></h3><br>

			<p>
				<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
				<input class="form-control" style="width: 350px; margin-left: auto; margin-right: auto" placeholder="Nova senha..." type="password" name="new" value="" id="new" pattern="^.{8}.*$">		</p>

			<p>
				<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
				<input class="form-control" style="width: 350px; margin-left: auto; margin-right: auto" placeholder="Digite novamente..." type="password" name="new_confirm" value="" id="new_confirm" pattern="^.{8}.*$">		</p>

			<?php echo form_input($user_id);?>
			<br><p><button class="btn btn-primary" type="submit" name="submit" value=""><strong>Mudar Senha</strong></button></p>		</div>

	<?php echo form_hidden($csrf); ?>
	</form>
	<!--< ?php echo form_close();?>-->
@stop


