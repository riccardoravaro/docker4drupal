DomCrawler Component
====================

<<<<<<< HEAD
DomCrawler eases DOM navigation for HTML and XML documents.

If you are familiar with jQuery, DomCrawler is a PHP equivalent:

```php
use Symfony\Component\DomCrawler\Crawler;

$crawler = new Crawler();
$crawler->addContent('<html><body><p>Hello World!</p></body></html>');

print $crawler->filterXPath('descendant-or-self::body/p')->text();
```

If you are also using the CssSelector component, you can use CSS Selectors
instead of XPath expressions:

```php
use Symfony\Component\DomCrawler\Crawler;

$crawler = new Crawler();
$crawler->addContent('<html><body><p>Hello World!</p></body></html>');

print $crawler->filter('body > p')->text();
```
=======
The DomCrawler component eases DOM navigation for HTML and XML documents.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

Resources
---------

<<<<<<< HEAD
You can run the unit tests with the following command:

    $ cd path/to/Symfony/Component/DomCrawler/
    $ composer install
    $ phpunit
=======
  * [Documentation](https://symfony.com/doc/current/components/dom_crawler.html)
  * [Contributing](https://symfony.com/doc/current/contributing/index.html)
  * [Report issues](https://github.com/symfony/symfony/issues) and
    [send Pull Requests](https://github.com/symfony/symfony/pulls)
    in the [main Symfony repository](https://github.com/symfony/symfony)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
