<?php

namespace Opensoft\InkRouterSdk\Models\Attributes;

use \XMLWriter;

/**
 * @author James Taylor <james.taylor@opensoftdev.com>
 */
class NotepadsAttributes implements AttributeInterface
{
    /**
     * @var int
     */
    private $pages;

    /**
     * @param int $pages
     * @return NotepadsAttributes
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param bool $root
     * @return string
     */
    public function pack($root = false)
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        if ($root) {
            $writer->startDocument();
        }

        $writer->startElement('notepads_attributes');

        if (isset($this->pages)) {
            $writer->writeElement('pages', $this->pages);
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
