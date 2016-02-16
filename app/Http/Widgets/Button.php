<?php

namespace App\Http\Widgets;

class Button extends Widget
{
    public $url = '';
    public $label = '';

    /**
     * Set the button url.
     * @param $url
     * @param array $parameter
     * @return $this
     */
    public function url($url, $parameter = [])
    {
        $this->url = url($url) . '?' . http_build_query($parameter);
        return $this;
    }

    /**
     * Set label of this button.
     * @param $label
     * @return $this
     */
    public function label($label)
    {
        $this->label = $label;
        return $this;
    }
}