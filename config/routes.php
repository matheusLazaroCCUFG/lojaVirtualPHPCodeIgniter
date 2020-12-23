<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'home/index';
//$route['default_controller'] = 'principal';
//$route['default_controller'] = 'loja';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Loja Virtual
//User: administrador !=
//Cliente
$route['blade'] = 'testeBlade/index';
$route['codigos'] = 'codes/index';

$route['default_controller'] = 'home/index';//VITRINE


$route['todos'] = 'todosProdutos/index';
$route['todos/(:num)'] = 'todosProdutos/index/$1';
$route['todosMenorPreco'] = 'todosProdutos/menorPreco/$1';
$route['todosMenorPreco/(:num)'] = 'todosProdutos/menorPreco/$1';
$route['todosMaiorPreco'] = 'todosProdutos/maiorPreco/$1';
$route['todosMaiorPreco/(:num)'] = 'todosProdutos/maiorPreco/$1';
$route['todosMaisVendidos'] = 'todosProdutos/maisVendidos/$1';
$route['todosMaisVendidos/(:num)'] = 'todosProdutos/maisVendidos/$1';



//$route['categoria/masculino'] = 'home/mens';
//$route['categoria/feminino'] = 'home/womens';
$route['categoria/(:any)'] = 'categoria/index/$1';
$route['categoria/(:any)/(:num)'] = 'categoria/index/$1';
$route['categoriaMenorPreco/(:any)'] = 'categoria/menorPreco/$1';
$route['categoriaMenorPreco/(:any)/(:num)'] = 'categoria/menorPreco/$1';
$route['categoriaMaiorPreco/(:any)'] = 'categoria/maiorPreco/$1';
$route['categoriaMaiorPreco/(:any)/(:num)'] = 'categoria/maiorPreco/$1';
$route['categoriaMaisVendidos/(:any)'] = 'categoria/maisVendidos/$1';
$route['categoriaMaisVendidos/(:any)/(:num)'] = 'categoria/maisVendidos/$1';

$route['marca/(:any)'] = 'marca/index/$1';
$route['marca/(:any)/(:num)'] = 'marca/index/$1';
$route['marcaMenorPreco/(:any)'] = 'marca/menorPreco/$1';
$route['marcaMenorPreco/(:any)/(:num)'] = 'marca/menorPreco/$1';
$route['marcaMaiorPreco/(:any)'] = 'marca/maiorPreco/$1';
$route['marcaMaiorPreco/(:any)/(:num)'] = 'marca/maiorPreco/$1';
$route['marcaMaisVendidos/(:any)'] = 'marca/maisVendidos/$1';
$route['marcaMaisVendidos/(:any)/(:num)'] = 'marca/maisVendidos/$1';


//$route['busca'] = 'busca/index';
$route['busca/p'] = 'busca/index';//primeira pagina
$route['busca/p/(:num)'] = 'busca/index';
$route['busca/p/(:num)/menorPreco'] = 'busca/index';
$route['buscaMenorPreco/p'] = 'busca/buscaMenorPreco';//primeira pagina
$route['buscaMenorPreco/p/(:num)'] = 'busca/buscaMenorPreco';
$route['buscaMaiorPreco/p'] = 'busca/buscaMaiorPreco';//primeira pagina
$route['buscaMaiorPreco/p/(:num)'] = 'busca/buscaMaiorPreco';
$route['buscaMaisVendidos/p'] = 'busca/buscaMaisVendidos';
$route['buscaMaisVendidos/p/(:num)'] = 'busca/buscaMaisVendidos';

$route['sobre'] = 'home/about';
$route['tipos'] = 'home/typography';
$route['contato'] = 'home/contact';
$route['enviarEmail'] = 'home/email';

$route['icones'] = 'home/icons';
$route['produto/(:any)'] = 'produto/index/$1';
$route['ajax/calculoFrete'] = 'ajax/calcular_frete';

//$route['vitrine'] = 'home/index';


//Usuários administradores
$route['entrarAdm'] = 'users/login';//Administrador
$route['cadastrarAdm'] = 'users/register';//disponível somente se estiver logado como adm
$route['sairAdm'] = 'users/logout';
$route['users'] = 'users/index';
$route['esqueciSenha'] = 'users/forgot_password';
//$route['usuariosAdm'] = 'users/index';//disponível somente se estiver logado como adm

//Usuários clientes
$route['entrarCliente'] = 'loginCliente/login';//Administrador
$route['cadastrarCliente'] = 'loginCliente/register';
$route['moduloCliente'] = 'loginCliente/modulo';
$route['moduloCliente/core'] = 'loginCliente/core';
$route['moduloCliente/(:num)'] = 'loginCliente/modulo/$1';
$route['sairCliente'] = 'loginCliente/logout';
$route['user'] = 'loginCliente/mostraCliente';//único cliente
$route['clientes'] = 'loginCliente/mostraClientes';//vários clientes


$route['testelogin'] = 'auth/login';

$route['categorias'] = 'categorias/index';
$route['moduloCategorias'] = 'categorias/modulo';
$route['moduloCategorias/(:num)'] = 'categorias/modulo/$1';
$route['moduloCategorias/core'] = 'categorias/core';
$route['delCategoria/(:num)'] = 'categorias/del/$1';

$route['marcas'] = 'marcas/index';
$route['moduloMarcas'] = 'marcas/modulo';
$route['moduloMarcas/core'] = 'marcas/core';
$route['moduloMarcas/(:num)'] = 'marcas/modulo/$1';
$route['delMarca/(:num)'] = 'marcas/del/$1';

$route['produtos'] = 'produtos/index';
$route['moduloProdutos'] = 'produtos/modulo';
$route['moduloProdutos/(:num)'] = 'produtos/modulo/$1';
$route['moduloProdutos/core'] = 'produtos/core';
$route['delProduto/(:num)'] = 'produtos/del/$1';
$route['produtos/upload'] = 'produtos/upload';


$route['config'] = 'config/index';
$route['configPagseguro'] = 'config/pagseguro';
$route['configCorreios'] = 'config/correios';
$route['bannersHome'] = 'bannersHome/modulo';
$route['bannersHome/(:num)'] = 'bannersHome/core/$1';
$route['bannersHome/upload'] = 'bannersHome/upload';



$route['carrinho'] = 'carrinho2/index';//Carrinho de compras
$route['carrinho/add'] = 'carrinho2/add';//Carrinho de compras
$route['carrinho/alterar'] = 'carrinho2/alterar';//Carrinho de compras
$route['carrinho/apagar'] = 'carrinho2/apagar_item';//Carrinho de compras
$route['carrinho/carrinho_topo'] = 'carrinho2/carrinho_topo';//Carrinho de compras
$route['carrinho/limpar'] = 'carrinho2/limpa';//Carrinho de compras
$route['carrinho/apagar_item'] = 'carrinho2/apagar_item';//Carrinho de compras
$route['carrinho/alterar'] = 'carrinho2/alterar';//Carrinho de compras
$route['carrinho/teste'] = 'carrinho2/teste';//Carrinho de compras
$route['carrinho/calcula_frete'] = 'carrinho2/calcula_frete';//Carrinho de compras


$route['checkout'] = 'checkout/index';
$route['checkoutCombinar'] = 'checkout/combinarEntrega';
$route['checkout/login'] = 'checkout/login';
$route['checkout/loginCombinar'] = 'checkout/loginCombinar';
$route['pedidosRealizadosBoleto'] = 'pagar/pedidosRealizadosBoleto';
$route['pedidosRealizadosTransferencia'] = 'pagar/pedidosRealizadosTransferencia';
$route['pedidosRealizadosCartao'] = 'pagar/pedidosRealizadosTransferencia';
$route['pedidosRealizados'] = 'pagar/pedidosRealizados';
$route['codRastreio/(:num)'] = 'pedidos/salvaCodRastreio/$1';
$route['rastreio'] = 'pagar/rastreioCorreios';
$route['rastreio/(:any)'] = 'pagar/rastreioCorreios/$1';
$route['pagar/retornoPagseguro'] = 'pagar/retornoPagseguro';
//$route['checkoutLogado'] = 'checkout/login';


$route['pedidos'] = 'pedidos/index';//Lista de pedidos para entregar(administrador da loja)
$route['obterPedido/(:num)'] = 'pedidos/getPedido/$1';//Lista de pedidos para entregar(administrador da loja)
$route['mudarStatus/(:num)'] = 'pedidos/mudarStatus/$1';//Lista de pedidos para entregar(administrador da loja)
$route['mudarCodigo/(:num)'] = 'pedidos/getcodigo/$1';//Lista de pedidos para entregar(administrador da loja)
$route['imprimirPedido/(:num)'] = 'pedidos/imprimir/$1';//Lista de pedidos para entregar(administrador da loja)
$route['mudarStatusPedido/(:num)/(:num)'] = 'pedidos/mudarStatusPedido/$1/$2';//Lista de pedidos para entregar(administrador da loja)


$route['relatorioDiario'] = 'relatorios/diario';
$route['relatorioMaisVendidos'] = 'relatorios/mais_vendidos';

$route['dashboard'] = 'dashboard/index';


$route['admin/(:any)'] = 'admin/$1';
$route['admin/(:any)/(:any)'] = 'admin/$1/$2';



/**
 * Distribuição dos templates com blade
 * principal.blade.php : parte superior e inferior
 * home.blade.php: parte interna da home
 */
