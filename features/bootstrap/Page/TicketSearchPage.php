<?php

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class TicketSearchPage extends Page
{
  /**
   * @var string $path
   */
  protected $path = '/tickets.php';

  protected $elements = array(
    'Search form' => array('css' => 'form#search-form'),
  );

  /**
   * searchForTickets 
   * 
   * @param mixed $adult 
   * @param mixed $child 
   * @param mixed $youth 
   * @param mixed $senior 
   * @param mixed $origin 
   * @param mixed $destination 
   * @access public
   * @return void
   */
  function searchForTickets($adults, $children, $youths, $seniors, $origin, $destination) {
    $searchForm = $this->getElement('Search form');
    $searchForm->fillField('adults', $adults);
    $searchForm->fillField('children', $children);
    $searchForm->fillField('seniors', $seniors);
    $searchForm->fillField('youths', $youths);
    $searchForm->fillField('origin', $origin);
    $searchForm->fillField('destination', $destination);
    $searchForm->pressButton('Search for tickets');
    return $this;
  }

}
