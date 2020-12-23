<?php $__env->startSection('conteudo'); ?>

<link href="<?= base_url("loja/css/separadorPaginas.css") ?>" rel="stylesheet" type="text/css" media="all" />



	<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">
			<!----------------------------------------------------------------------------->



			<section class="content-header">
				<h1>
					<?= $titulo; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
					<li class="active"><?= $titulo; ?></li>

				</ol>

			</section>

			<?php
			/*$CI =& get_instance();
			if($CI->session->flashdata('msgCadastro')){
				echo $CI->session->flashdata('msgCadastro');
			}*/
			//$this->load->helper('helper_helper');
			getMsg('msgCadastro');
			if(validation_errors()){
				echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
			}

			?>

			<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/0"); ?>" >

				<!--upload de fotos-->
				<div class="form-group">
					<label class="col-sm-2 control-label"> Lojo da Loja | Imagem Png Transparente</label>
					<div class="clearfix">
						<div id="file_upload_fotos_banner0">Upload</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 retorno_fotos_banner0">

						<?php foreach ($fotosBanner0 as $foto): ?>

						<div class="col-sm-3 img_foto_produtos_view">
							<img  width="100px" src="<?= base_url('loja/images/bannersHome/' . $foto->foto)?>">
							<input type="hidden" value="<?= $foto->foto ?>" name="foto_banner0[]">
							<a  class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
						</div>
						<?php endforeach; ?>

					</div>
				</div>
				<?php if($fotosBanner0): ?>
				<input type="hidden" name="id_banner0" value="<?= $fotosBanner0[0]->id_banner; ?>">
				<?php endif; ?>
				<label>Tamanho da Foto em (px)</label>
				<input style="border-color: black" class="input-numerico form-control" type="tel" name="tamanhoLogoLoja" value="<?=$tamanhoLogoLoja?>">

				<br><input class="btn btn-success" type="submit" value="Salvar Banner 0">


			</form>

			<hr class="separator separator--dotter" />


			<h3 class="text-center">Mapa da Página principal</h3>
			<div class="text-center">
				<img style="height: 1000px" src="<?=base_url("loja/images/bannersHome/mapaBannersHome.png")?>">
			</div><hr>
			<div>
				<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/1"); ?>" >

					<!--upload de fotos-->
					<div class="form-group">
						<label class="col-sm-2 control-label">Fotos do Banner 1 (Múltiplas fotos)</label>
						<div class="clearfix">
							<div id="file_upload_fotos_banner1">Upload</div>
						</div>
					</div>
						<div class="form-group">
									<div class="col-sm-10 retorno_fotos_banner1">

										<?php foreach ($fotosBanner1 as $foto): ?>

											<div class="col-sm-3 img_foto_produtos_view">
												<img  width="100px" src="<?= base_url('loja/images/bannersHome/' . $foto->foto)?>">
												<input type="hidden" value="<?= $foto->foto ?>" name="foto_banner1[]">
												<a  class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
											</div>
										<?php endforeach; ?>

									</div>
						</div>
						<?php if($fotosBanner1): ?>
						<input type="hidden" name="id_banner1" value="<?= $fotosBanner1[0]->id_banner; ?>">
						<?php endif; ?>

						<div class="clearfix"></div>

						<br><input class="btn btn-success" type="submit" value="Salvar Banner 1">
				</form>

				<hr class="separator separator--dotter" />


				<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/2"); ?>" >

					<!--upload de fotos-->
					<div class="form-group">
						<label class="col-sm-2 control-label">Fotos do Banner 2 (única foto)</label>
						<div class="clearfix">
							<div id="file_upload_fotos_banner2">Upload</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 retorno_fotos_banner2">

							<?php foreach ($fotosBanner2 as $foto): ?>

							<div class="col-sm-3 img_foto_produtos_view">
								<img  width="100px" src="<?= base_url('loja/images/bannersHome/' . $foto->foto)?>">
								<input type="hidden" value="<?= $foto->foto ?>" name="foto_banner2[]">
								<a  class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
					<?php if($fotosBanner2): ?>
					<input type="hidden" name="id_banner2" value="<?= $fotosBanner2[0]->id_banner; ?>">
					<?php endif; ?>
					<div class="clearfix"></div>
					<label>Mensagem do Banner 2</label>
					<input style="width: 100%; border-color:  black" class="form-control" type="text" name="mensagemBanner2" value="<?=$mensagemBanner2[0]->mensagem?>">
					<br>
					<br><input class="btn btn-success" type="submit" value="Salvar Banner 2">


				</form>

				<hr class="separator separator--dotter" />



				<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/3"); ?>" >

					<?php if($fotosBanner3): ?>
					<input type="hidden" name="id_banner3" value="<?= $fotosBanner3[0]->id_banner; ?>">
					<?php endif; ?>

					<div class="clearfix"></div>
					<label>Mensagem do Banner 3</label>
					<input style="width: 100%;border-color:  black" class="form-control" type="text" name="mensagemBanner3" value="<?=$mensagemBanner3[0]->mensagem?>">
					<br>
					<br><input class="btn btn-success" type="submit" value="Salvar Banner 3">
				</form>

				<hr class="separator separator--dotter" />




				<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/4"); ?>" >


					<?php if($fotosBanner4): ?>
					<input type="hidden" name="id_banner4" value="<?= $fotosBanner4[0]->id_banner; ?>">
					<?php endif; ?>

					<div class="clearfix"></div>
					<label>Mensagem do Banner 4</label>
					<input style="width: 100%; border-color:  black" class="form-control" type="text" name="mensagemBanner4" value="<?=$mensagemBanner4[0]->mensagem?>">
					<br>
					<br><input class="btn btn-success" type="submit" value="Salvar Banner 4">
				</form>

				<hr class="separator separator--dotter" />




				<form role="form" method="post" class="form-group" action="<?= base_url("bannersHome/5"); ?>" >

					<!--upload de fotos-->
					<div class="form-group">
						<label class="col-sm-2 control-label">Fotos do Banner 5 (única foto)</label>
						<div class="clearfix">
							<div id="file_upload_fotos_banner5">Upload</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 retorno_fotos_banner5">

							<?php foreach ($fotosBanner5 as $foto): ?>

							<div class="col-sm-3 img_foto_produtos_view">
								<img  width="100px" src="<?= base_url('loja/images/bannersHome/' . $foto->foto)?>">
								<input type="hidden" value="<?= $foto->foto ?>" name="foto_banner5[]">
								<a  class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
					<?php if($fotosBanner5): ?>
					<input type="hidden" name="id_banner5" value="<?= $fotosBanner5[0]->id_banner; ?>">
					<?php endif; ?>

					<div class="clearfix"></div>
					<label>Mensagem do Banner 5</label>
					<input style="width: 100%; border-color:  black" class="form-control" type="text" name="mensagemBanner5" value="<?=$mensagemBanner5[0]->mensagem?>">
					<br>
					<br><input class="btn btn-success" type="submit" value="Salvar Banner 5">
				</form>

				<hr class="separator separator--dotter" />

		</div>
		<div class="clearfix"></div>







			<!----------------------------------------------------------------------------->

		</div>
	</div>
	<!-- //typography-page -->

</div>

<!--content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/bannersHome.blade.php ENDPATH**/ ?>