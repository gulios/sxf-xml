# SXF - XML Component

The XML component helps with XML data.



##### Example usage:

1. Use [Composer](http://getcomposer.org) to install SXF XML into your project:

    ```bash
    composer require gulios/sxf-xml
    ```

1. Simple usage:


```php
$this->xmlDataSXF = new SimpleXMLHelper('<xml/>');
$test = $this->xmlDataSXF->addChild('test');
$test->addAttribute('name', 'someValue');
```
