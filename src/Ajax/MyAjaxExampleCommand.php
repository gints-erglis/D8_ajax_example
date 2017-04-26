<?php

namespace Drupal\ajax_example\Ajax;

use Drupal\Core\Ajax\CommandInterface;

class MyAjaxExampleCommand implements CommandInterface {

  public function __construct($selector, $foo = NULL){
    $this->selector = $selector;
    $this->foo = $foo;
  }
  public function render(){
    return array(
      'command' => 'MyAjaxExample',
      'method' => NULL,
      'selector' => $this->selector,
      'foo' => $this->foo,
    );
  }

}
