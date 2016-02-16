<?php

namespace App\Http\Widgets;

class Table extends Widget
{
    private $columns = [];

    /**
     * Add a column to the table.
     * @param $key
     * @param $label
     */
    public function column($key, $label)
    {
        $this->columns[$key] = $label;
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
                $html .= '<td>' . $d->$key . '</td>';
            }
            $html .= '</tr>';
        }

        return $html;
    }
}