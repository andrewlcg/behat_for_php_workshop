Feature: All children must be accompanied by an adult
  As the CEO
  I want to ensure that all child tickets are sold with one or more adult tickets
  So that we do not fall foul of the law
  
  Scenario: No child-only journeys
    Given I am on the ticket search page
    When I try to search for tickets for "0" adults, "2" children, "0" youths and "0" seniors from "Heathrow" to "New York"
    Then I should see the "child & adult fare policy" message
    And I should be on the ticket search page
