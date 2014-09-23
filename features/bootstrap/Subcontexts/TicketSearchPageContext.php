<?php
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use Behat\Behat\Event\StepEvent;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Context\Step\Then;
use Behat\Behat\Context\Step\When;
use Drupal\DrupalExtension\Context\DrupalContext;
use Behat\Behat\Context\ClosuredContextInterface;
use Behat\Behat\Context\TranslatedContextInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

class TicketSearchPageContext extends EasyAirPageContext {

  /**
   * @Given /^I am on the ticket search page$/
   */
  public function iAmOnTheTicketSearchPage() {
    if (!$this->getPage("Ticket Search Page")->open()) {
      throw new Exception("Not on the Ticket Search Page");
    }
  }

  /**
   * @Given /^I should be on the ticket search page$/
   */
  public function iShouldBeOnTheTicketSearchPage() {
    if (!$this->getPage("Ticket Search Page")->isOpen()) {
      throw new Exception("Not on the Ticket Search Page");
    }
  }

  /**
   * @When /^I try to search for tickets for "([^"]*)" adults, "([^"]*)" children, "([^"]*)" youths and "([^"]*)" seniors from "([^"]*)" to "([^"]*)"$/
   */
  public function iTryToSearchForTicketsForAdultsChildrenYouthsAndSeniorsFromTo($adult_tickets, $child_tickets, $youth_tickets, $senior_tickets, $origin, $destination) {
    if (!$this->getPage("Ticket Search Page")->searchForTickets($adult_tickets, $child_tickets, $youth_tickets, $senior_tickets,$origin, $destination)) {
      throw new Exception("Failed to search for tickets");
    }
  }

  /**
   * @Then /^I should see the "([^"]*)" message$/
   */
  public function iShouldSeeTheMessage($message) {
    $message_text = "";
    if ($message == 'child & adult fare policy') {
      $message_text = "Children cannot travel alone";
    }

    if (!$message_text) {
      throw new Exception("I don't know what message {$message} is");
    }

    return array(new Then('I should see "' . $message_text . '"')); 

  }

}
