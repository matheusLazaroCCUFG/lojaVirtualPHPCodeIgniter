
@extends('viewsStore/principal')
@section('conteudo')

	<link rel="stylesheet" type="text/css" href="<?= base_url('loja/css/table.css') ?>">
	<br><br>
<h1 class="text-center" style="color: darkgreen">Rastreamento do seu pedido nos Correios</h1>
<table class="rwd-table">
	<tr>
		<th style="width: 500px">Data e hora</th>
		<th style="width: 500px">Local</th>
		<th style="width: 500px">Situação</th>
	</tr>
	<?php foreach ($json as $atualizacao): ?>
		<tr>
			<td><?=$atualizacao['date'] . ' - ' .$atualizacao['hour']?></td>
			<td><?=$atualizacao['location']?></td>
			<td><?=$atualizacao['message']?></td>
		</tr>
	<?php endforeach; ?>
</table>
@stop
