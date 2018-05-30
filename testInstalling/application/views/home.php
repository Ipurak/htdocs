<?php $this->load->view('layouts/head') ?>

<?php 
	echo '<br><b>site_url:</b> '.site_url('/public/');
	echo '<br><b>index_page:</b> '.index_page();
	echo '<br><b>base_url:</b> '.base_url('/public/js');
	echo '<br><b>anchor:</b> '.anchor();

	//set session
	// $this->session->set_userdata(array('name'=>'a','id'=>1));
	// echo '<br>Session: '.$this->session->userdata('name');
	// echo '<br>Name: '.$this->session->userdata('id');
	// echo '<br>Session: '.$this->session->userdata();

	//destroy session
	// $this->session->unset_userdata();  
	// echo '<br>After Destroy Session: '.$this->session->userdata();

	//Cart
	echo '<br>'.'<h3>Cart</h3>';
	$this->load->library('cart');//load library

	//insert
	$data = array(
               'id'      => 'sku_123ABC',
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => 'T-Shirt',
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );
	$this->cart->insert($data);

	//display
	$indexCart = 0;
	foreach ($this->cart->contents() as $item) {
		$indexCart++;
		echo "<br>".$indexCart." id: ".$item['id']." qty: ".$item['qty']."price: ".$item['price']."name: ".$item['name']."options-size: ".$item['options']['Size']."options-color: ".$item['options']['Color'];
	}

	//remove
	$data = array(
		'rowid'=> '0256a32c98ce49afbe2a4eb8c96c5884',
		'qty'=> 0
	);
	$this->cart->update($data);


print_r($this->cart->contents());


?>

<h1>Hello this home view</h1>

<?php $this->load->view('layouts/footer') ?>