Feature: Scrap behat references from Wikipedia
  In order to get behat references
  As an anonymous user
  I visit wikipedia behat entry and scrap the references lis

#  Scenario: Scrap References
#    Given I am on "http://www.wikipedia.org"
#    Then I should see "The Free Encyclopedia"
#    When I follow "English"
#    Then the url should match "wiki/Main_Page"
#    And I should see "Welcome to Wikipedia,"
#    When I fill in "Search Wikipedia" with "behat computer"
#    And I press "Search Wikipedia"
#    And print current URL
#    And I follow "Behat (computer science)"
#    Then I should see "Behat is intended to aid communication between developers, clients and other stakeholders during a software development process. "
#    And I save references in a local storage device


  Scenario: Scrap References
    Given I am on "http://www.wikipedia.org"
    When I follow "English"
    Then the url should match "wiki/Main_Page"
    And I should see "the free encyclopedia "
    When I follow "Technology"
    Then the url should match "wiki/Portal:Technology"
    And I should see "Refresh selections"
