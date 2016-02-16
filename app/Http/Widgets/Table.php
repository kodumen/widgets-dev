<?php

namespace App\Http\Widgets;

class Table extends Widget
{
    private $columns = [];
    private $callbacks = [];

    /**
     * Add a column to the table.
     * @param $key
     * @param $label
     * @param \Closure $callback
     */
    public function column($key, $label, \Closure $callback = null)
    {
        $this->columns[$key] = $label;
        if (starts_with($key, '_') && $callback !== null) {
            $this->callbacks[$key] = $callback;
        }
    }

    /**
     * Return this as an html table.
     * @return string
     */
    public function build()
    {
       return $this->buildHeaders() . $this->buildRows();
    }

    /**
     * Return the column headers as html table headers.
     * @return string
     */
    private function buildHeaders()
    {
        $html = '<tr>';
        foreach ($this->columns as $column) {
            $html .= '<th>' . $column . '</th>';
        }
        $html .= '</tr>';

        return $html;
    }

    /**
     * Return table data as html rows.
     * @return string
     */
    private function buildRows()
    {
        $html = '';
        foreach ($this->data as $d) {
            $html .= '<tr>';
            foreach ($this->columns as $key => $label) {
                if (starts_with($key, '_')) {
                    $html .= '<td>' . $this->callbacks[$key]($d) . '</td>';
                } else {
                    $html .= '<td>' . $d->$key . '</td>';
                }
            }
            $html .= '</tr>';
        }

        return $html;
    }
}