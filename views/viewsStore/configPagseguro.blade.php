
@extends('viewsStore/principal')
@section('conteudo')


<!--content-->
<div class="content">
	<!--typography-page -->
	<div class="typo-w3">
		<div class="container">

			<?php
			if(validation_errors('<div>', '</div>')){
				echo '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
			}
			getMsg('msgCadastro');

			//getMsg('msgCadastro');


			?>


			<section class="content-header">
				<h1>
					<?= $titulo; ?>
				</h1>

				<ol class="breadcrumb">
					<li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a> </li>
					<li class="active"><?= $titulo; ?></li>

				</ol>

			</section>

			<section class="content">
				<div class="box">
					<div class="bs-docs-example">

						<form class="form-horizontal" method="post" action="<?= base_url('configPagseguro'); ?>">
							<div class="form-group">
								<div class="key">
									<label>E-mail</label>
									<div class="col-sm-10">

										<input style="border-color:  black" type="text" value="<?= ($query != null ? $query->email : set_value('email')); ?>"  name="email" class="form-control" id="email" placeholder="E-mail">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<label>Token</label>

									<div class="col-sm-10">

										<input style="border-color:  black" type="text" value="<?= ($query != null ? $query->token : set_value('token')); ?>"  name="token" class="form-control" id="token" placeholder="Token">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<label>Boleto</label>

									<div class="col-sm-10">
										<select style="border-color:  black"  name="boleto" class="form-control">
											<option value="1" <?= $query->boleto == 1 ? 'selected' : '' ?>>Sim</option>
											<option value="0" <?= $query->boleto == 0 ? 'selected' : '' ?>>Não</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<label>Cartão</label>

									<div class="col-sm-10">
										<select style="border-color:  black"  name="cartao" class="form-control select-cartao">
											<option value="1" <?= $query->cartao == 1 ? 'selected' : '' ?>>Sim</option>
											<option value="0" <?= $query->cartao == 0 ? 'selected' : '' ?>>Não</option>
										</select>
									</div>
									<div class="clearfix"></div>
									<br>

										<div class="col-sm-10 select-parcelas-sem-juros <?= ($query->cartao == 1 ? '' : 'hide') ?>">
											<label>Quantidade de parcelas sem juros no Cartão</label>

											<select style="border-color:  black"  name="parcelas_sJuros" class="form-control">
												<option value="1" <?= $query->parcelas_sJuros == 1 ? 'selected' : 1 ?>>1</option>
												<option value="2" <?= $query->parcelas_sJuros == 2 ? 'selected' : 2 ?>>2</option>
												<option value="3" <?= $query->parcelas_sJuros == 3 ? 'selected' : 3 ?>>3</option>
												<option value="4" <?= $query->parcelas_sJuros == 4 ? 'selected' : 4 ?>>4</option>
												<option value="5" <?= $query->parcelas_sJuros == 5 ? 'selected' : 5 ?>>5</option>
												<option value="6" <?= $query->parcelas_sJuros == 6 ? 'selected' : 6 ?>>6</option>
												<option value="7" <?= $query->parcelas_sJuros == 7 ? 'selected' : 7 ?>>7</option>
												<option value="8" <?= $query->parcelas_sJuros == 8 ? 'selected' : 8 ?>>8</option>
												<option value="9" <?= $query->parcelas_sJuros == 9 ? 'selected' : 9 ?>>9</option>
												<option value="10" <?= $query->parcelas_sJuros == 10 ? 'selected' : 10 ?>>10</option>
												<option value="11" <?= $query->parcelas_sJuros == 11 ? 'selected' : 11 ?>>11</option>
												<option value="12" <?= $query->parcelas_sJuros == 12 ? 'selected' : 12 ?>>12</option>
												<option value="13" <?= $query->parcelas_sJuros == 13 ? 'selected' : 13 ?>>13</option>
												<option value="14" <?= $query->parcelas_sJuros == 14 ? 'selected' : 14 ?>>14</option>
												<option value="15" <?= $query->parcelas_sJuros == 15 ? 'selected' : 15 ?>>15</option>
												<option value="16" <?= $query->parcelas_sJuros == 16 ? 'selected' : 16 ?>>16</option>
												<option value="17" <?= $query->parcelas_sJuros == 17 ? 'selected' : 17 ?>>17</option>
												<option value="18" <?= $query->parcelas_sJuros == 18 ? 'selected' : 18 ?>>18</option>
											</select>
										</div>

								</div>
							</div>
							<div class="form-group">
								<div class="key">
									<label>Transferência</label>

									<div class="col-sm-10">
										<select style="border-color:  black"  name="transferencia" class="form-control">
											<option value="1" <?= $query->transferencia == 1 ? 'selected' : '' ?>>Sim</option>
											<option value="0" <?= $query->transferencia == 0 ? 'selected' : '' ?>>Não</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="key">
									<label>Ambiente</label>

									<div class="col-sm-10">
										<select style="border-color:  black"  name="ambiente" class="form-control">
											<option value="1" <?= $query->ambiente == 1 ? 'selected' : '' ?>>Sandbox (Teste)</option>
											<option value="2" <?= $query->ambiente == 2 ? 'selected' : '' ?>>Produção (Real)</option>
										</select>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>




							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Salvar</button>
								</div>
							</div>
						</form>



					</div>
				</div>
			</section>






		</div>
	</div>
	<!-- //typography-page -->

</div>
<!--content-->
@stop
