<?php
echo $this->Paypal->button('Pay Now', array('test' => true, 'amount' => '12.00', 'item_name' => 'change this to property name','item_number'=>91,'custom'=>2));
 ?>