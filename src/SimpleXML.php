<?php namespace SXF\XML;

use SimpleXMLElement;

/**
 * Class SimpleXML
 * @package SXF\XML
 */
class SimpleXML extends SimpleXMLElement
{
    /**
     * @param $data
     * @param bool $attributes
     * @return $this
     * @var SimpleXML
     */
    private function addDataToXml(array $data, bool $attributes = false)
    {
        foreach ($data as $key => $value)
        {
            // clean key names
            $key = preg_replace('/[\W]/', '', $key);
            if ('' === $key or is_numeric($key))
            {
                $key = 'item';
            }

            if (is_array($value) or is_object($value))
            {
                /* @var $xmlChild SimpleXML */
                $xmlChild = $this->addChild($key);
                $xmlChild->addDataToXml($value, $attributes);
            }
            else
            {
                if (true === $attributes)
                {
                    $this->addAttribute($key, htmlspecialchars($value));
                }
                else
                {
                    $this->addChild($key, htmlspecialchars($value));
                }
            }
        }
        return $this;
    }

    /**
     * @param array $data
     * @param string $tagName
     * @param bool $attributes
     * @return SimpleXML
     */
    public function addArrayData(array $data, string $tagName, bool $attributes = false)
    {
        $xmlData = $this->addChild($tagName);

        /* @var $xmlData SimpleXML */
        return $xmlData->addDataToXml($data, $attributes);
    }
}
