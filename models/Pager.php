<?php

class Pager extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function config($base_url, $total_rows_db, $per_page = 24, $uri_segment,$num_links = 3)
	{
		$config = [
			'base_url' => base_url($base_url),
			'per_page' => $per_page,
			'num_links' => $num_links,//link das prox paginas
			'uri_segment' => $uri_segment,
			'total_rows' => $total_rows_db,
			'full_tag_open' => '<ul class="pagination pagination-lg">',
			'full_tag_close' => '</ul>',
			'first_link' => false,//sem link levando para a primeira pagina
			'last_link' => false,
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'prev_link' => '<i class="fa fa-arrow-left"></i>',
			'prev_tag_open' => "<li class='prev'>",
			'prev_tag_close' => "</li>",
			'next_link' => '<i class="fa fa-arrow-right"></i>',
			'next_tag_open' => "<li class='prev'>",
			'next_tag_close' => "</li>",
			'last_tag_open' => "<li>",
			'last_tag_close' => "</li>",
			'cur_tag_open' => "<li class='active'><a>",
			'cur_tag_close' => "</a></li>",
			'num_tag_open' => "<li>",
			'num_tag_close' => "</li>"
		];

		$this->pagination->initialize($config);
	}


}
