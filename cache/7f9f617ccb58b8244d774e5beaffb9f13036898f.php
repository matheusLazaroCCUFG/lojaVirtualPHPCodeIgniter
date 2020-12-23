<?php $__env->startSection('conteudo'); ?>
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/botaoDashboard.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/graficoDashboard.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/menuLateral.css') ?>">

	<link rel="stylesheet" href="<?= base_url("loja/css/AdminLTE.min.css") ?>">




	<div id="cont">
		<div id="menu-fixed">
			<a href="#cont">
				<i class="material-icons back glyphicon glyphicon-menu-left"></i>
			</a>
			<a href="#menu-fixed">
				<div class="logo">
					<span></span>
					<p>TITLE</p>
				</div>
				<p class="pmenu">MENU</p>
			</a>
			<hr>
			<ul class="menu">
				<a href="<?= base_url('config') ?>"><li><i class="material-icons fa fa-home"></i><p>Home</p></li></a>
				<a style="color: white" href="<?= base_url('users') ?>" class=""><li>
					<span class="badge bg-purple"></span>
					<i class="material-icons fa fa-users"></i>
					<p>Usuários admin</p></li></a>
				<a href="<?= base_url('bannersHome') ?>"><li><i class="material-icons fa fa-image"></i><p>Banners & Logo da Loja</p></li></a>
				<a href="<?= base_url('config') ?>"><li><i class="material-icons fa fa-cogs"></i><p>Config. da Loja</p></li></a>
				<a href="<?= base_url('configCorreios') ?>"><li><i class="material-icons fa fa-truck"></i><p>Config. do Frete</p></li></a>
				<a href="<?= base_url('configPagseguro') ?>"><li><i class="material-icons fa fa-money"></i><p>Config. do PagSeguro</p></li></a>
			</ul>
		</div>
	</div>








	<div class="typo-w3">
		<div class="container">
			<h2 class="tittle text-center" style="font-size: 45px">Painel de controle</h2><br>
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


			<div class="box-reader with-border"
				<div class="row">
						<div class="col-lg-2 col-xs-5">
							<!-- small box -->
							<a href="<?= base_url('pedidos') ?>" >
								<div class="small-box bg-light-blue-gradient">
									<div class="inner">
										<h3><?= $t_pedidos ?></h3>

										<p>Pedidos</p>
									</div>
									<div class="icon">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</div>
									<h5 class="small-box-footer">Ver pedidos <i class="fa fa-arrow-circle-right"></i></h5>
								</div>
							</a>
						</div>



					<div class="col-lg-2 col-xs-5">
							<!-- small box -->
						<a href="<?= base_url('clientes') ?>" >
							<div class="small-box bg-light-blue-gradient">
								<div class="inner">
									<h3><?= $t_clientes ?></h3>

									<p>Clientes</p>
								</div>
								<div class="icon">
									<i class="fa fa-user-circle-o" aria-hidden="true"></i>
								</div>
								<h5 class="small-box-footer">Ver clientes<i class="fa fa-arrow-circle-right"></i></h5>
							</div>
						</a>
						</div>



					<div class="col-lg-2 col-xs-5">
							<!-- small box -->
						<a href="<?= base_url('produtos') ?>" >
							<div class="small-box bg-light-blue-gradient">
								<div class="inner">
									<h3><?= $t_produtos ?></h3>

									<p>Produtos</p>
								</div>
								<div class="icon">
									<i class="fa fa-cubes" aria-hidden="true"></i>
								</div>
								<h5 class="small-box-footer">Ver produtos<i class="fa fa-arrow-circle-right"></i></h5>
							</div>
						</a>
						</div>



					<div class="col-lg-2 col-xs-5">
							<!-- small box -->
						<a href="<?= base_url('categorias') ?>" >
							<div class="small-box bg-light-blue-gradient">
								<div class="inner">
									<h3><?= $t_categorias ?></h3>

									<p>Categorias</p>
								</div>
								<div class="icon">
									<i class="fa fa-list"></i>
								</div>
								<h5 class="small-box-footer">Ver categorias<i class="fa fa-arrow-circle-right"></i></h5>
							</div>
						</a>

						</div>
					<?php if($config->possui_marcas == 1): ?>
							<div class="col-lg-2 col-xs-5">
								<!-- small box -->
								<a href="<?= base_url('marcas') ?>" >
								<div class="small-box bg-light-blue-gradient">
									<div class="inner">
										<h3><?= $t_marcas ?></h3>

										<p>Marcas</p>
									</div>
									<div class="icon">
										<i class="fa fa-apple"></i>
									</div>
									<h5 class="small-box-footer">Ver marcas<i class="fa fa-arrow-circle-right"></i></h5>
								</div>
								</a>

							</div>
					<?php endif; ?>
				</div>
			</div>

		<?php $i = 0; foreach ($array as $data): ?>
			<input type="hidden" name="data<?=$i?>" value="<?=$data?>">
		<?php $i++; endforeach; ?>

		<?php $i = 0; foreach ($datas as $data): ?>
		<input type="hidden" name="datas<?=$i?>" value="<?=$data?>">
		<?php $i++; endforeach; ?>


			<!--<div class="row">
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Últimos pedidos</h3>
						</div>
						<div class="box-body">

								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Data</th>
											<th>Nome</th>
											<th>Valor</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										< ?php foreach($pedidos as $pedido): ?>
											<tr>
												<td>< ?= formataDataView($pedido->data_cadastro) ?></td>
												<td>< ?= $pedido->username ?></td>
												<td>< ?= $pedido->total_pedido ?></td>
												<td>< ?= $pedido->titulo_status ?></td>
											</tr>
										< ?php endforeach; ?>
									</tbody>
								</table>
						</div>
						<div class="box-footer">
							<a href="< ?= base_url("pedidos") ?>" title="">
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>  Todos os Pedidos
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Últimos 25 clientes cadastrados</h3>
						</div>
						<div class="box-body">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>Data de cadastro</th>
									<th>Nome</th>
								</tr>
								</thead>
								<tbody>
								< ?php foreach($clientes as $cliente): ?>
											<tr>
												<td>< ?= formataDataView($cliente->data_cadastro) ?></td>
												<td>< ?= $cliente->username ?></td>
											</tr>
								< ?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="box-footer">
							<a href="< ?= base_url("clientes") ?>" title="">
								<i class="fa fa-long-arrow-right" aria-hidden="true"></i>  Todos os clientes
							</a>
						</div>
					</div>
				</div>



		</div>-->
	</div>


	<div class="wrap">
		<h2 class="text-center">Visitas nos últimos 15 dias (Contabilizado a cada 1 hora, por IP)</h2>
		<div class="barGraph">
			<?php  $i = 0; foreach ($datas as $data): ?>
			<ul class="graph">
					<span class="graph-barBack">
					<li class="graph-bar" data-value="<?=$array[$i]?>">
					  <span class="graph-legend"><?=$data?></span>
					</li>
					</span>
			</ul>
			<?php $i++; endforeach; ?>
		</div>
	</div>
	<!-- //typography-page -->

</div>
	<script src="<?= base_url('loja/js/menuLateral.js') ?>"></script>

<!--content-->

	<?php $__env->stopSection(); ?>

<?php echo $__env->make('viewsStore/principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/diogoj09/public_html/application/views/viewsStore/dashboard.blade.php ENDPATH**/ ?>