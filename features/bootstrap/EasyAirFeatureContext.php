<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException,
    Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode,
    Drupal\DrupalExtension\Context\DrupalContext;

/**
 * Project features context.
 * 
 * Responsible for custom step defintions for this project
 */
class EasyAirFeatureContext extends DrupalContext
{
  /**
   * Initializes subcontexts by interating over each file in the Subcontexts director
   *
   * @param array $parameters context parameters (set them up through behat.yml)
   */
  public function __construct(array $parameters)
  {
    //Load all of our subcontexts
    $dir = new DirectoryIterator(dirname(__FILE__) . '/Subcontexts/');
    foreach($dir as $file) {
      if ($file->isFile() && ((pathinfo($file->getFilename(), PATHINFO_EXTENSION) == 'php'))) {
        //we'll attempt to load this as a subcontext using the the filename as 
        //a basis for the class
        $alias = strtolower($file->getBasename('.php') . '_context');
        $class = $file->getBasename('.php');
        $this->useContext($alias, new $class());
      }
    }
  }



}
