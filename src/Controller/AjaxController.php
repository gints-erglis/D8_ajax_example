<?php

namespace Drupal\ajax_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\Tags;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ChangedCommand;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\ajax_example\Ajax\MyAjaxExampleCommand;
/**
 * An example controller.
 */
class AjaxController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function content(Request $request, $field_name, $count) {

    $results = [];
    $typed_string = 'ccc';

    // Get the typed string from the URL, if it exists.
    if ($input = $request->query->get('q')) {
      $typed_string = Tags::explode($input);
      $typed_string = Unicode::strtolower(array_pop($typed_string));
    }

    $results[] = [
    'value' => 'abula',
    'label' => 'abula',
    ];
    $results[] = [
    'value' => 'bulta',
    'label' => 'bulta',
    ];
    $results[] = [
    'value' => $typed_string,
    'label' => $typed_string,
    ];

    return new JsonResponse($results);

  }

  public function content2() {
    $ajax_response = new AjaxResponse();

    //$ajax_response->addCommand(new HtmlCommand('#myContent', 'hallo'));
    $ajax_response->addCommand(new MyAjaxExampleCommand('#myContent2', 'hallo'));

    return $ajax_response;

  }
}
