<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Element\NodeElement;


/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{

    public function __construct()
    {
    }

    /**
     * @Then I save references in a local storage device
     */
    public function iSaveReferencesInALocalStorageDevice()
    {
//        $page = $this->getSession()->getPage();
//
//        $content = $page->find('named', array('id', 'mw-content-text'));
//
//        /**@var NodeElement $references */
//        $references = $content->find('css', '.references');
//
//        /** @var array $items */
//        $items = $references->findAll('css', 'li');
//
//        $links = [];
//
//        /** @var NodeElement $item */
//        foreach ($items as $item){
//            $linkContainer = $item->find('xpath', '//span[@class="reference-text"]');
//            $links[] = $linkContainer->find('xpath', '//a/@href')->getText();
//        }
//
//        file_put_contents('scrapped_references.txt', join(PHP_EOL, $links));

        $closure = function ($item){
            return $item->getText();
        };

        $xpath = '//span[@class="reference-text"]/a/@href';
        $links = array_map($closure, $this->findAll('xpath', $xpath));
        file_put_contents('scrapped_references_again.txt', join(PHP_EOL, $links));

    }


    /**
     * @Then I save references in a new local storage device
     */
    public function iSaveReferencesInANewLocalStorageDevice()
    {
        $page = $this->getSession()->getPage();

        $content = $page->find('named', array('id', 'mw-content-text'));

        /**@var NodeElement $references */
        $references = $content->find('css', '.references');

        /** @var array $items */
        $items = $references->findAll('css', 'li');

        $links = [];

        /** @var NodeElement $item */
        foreach ($items as $item){
            $linkContainer = $item->find('xpath', '//span[@class="reference-text"]');
            $links[] = $linkContainer->getText();
        }

        file_put_contents('scrapped_references_of_lion.txt', join(PHP_EOL, $links));
    }


    public function __call($method, $parameters)
    {
        $page = $this->getSession()->getPage();
        if(method_exists($page, $method)){
            return call_user_func_array(array($page, $method), $parameters);
        }
    }
}
