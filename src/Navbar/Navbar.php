<?php

namespace Anax\Navbar;

/**
 * Navbar Class
 */

 use \Anax\Configure\ConfigureInterface;
 use \Anax\Configure\ConfigureTrait;
 use \Anax\DI\InjectionAwareInterface;
 use \Anax\DI\InjectionAwareTrait;

class Navbar implements \Anax\DI\InjectionAwareInterface, ConfigureInterface
{
    use \Anax\DI\InjectionAwareTrait;
    use ConfigureTrait;

    /**
     * Get HTML for the navbar.
     *
     * @return string as HTML with the navbar.
     */
    public function getHTML()
    {
        $items = $this->config;
        $html = "<ul>";

        foreach ($items["items"] as $value) {
            $selected = $this->di->get("request")->getRoute() == $value ?
            "selected" : "";
            $url = $this->di->get("url")->create($value["route"]);
            $html.="<li class".$selected."><a href='".$url."'>".$value["text"]."</a></li>";
        }
        $html.="</ul>";
        return $html;
    }
}
