<?php

namespace App\CustomClasses;

use LaravelDaily\Invoices\Classes\InvoiceItem as BaseInvoiceItem;

class CustomInvoiceItem extends BaseInvoiceItem
{
    public $dateofshift;

    public function setDateOfShift($date)
    {
        $this->dateofshift = $date;
        return $this;
    }

    public function getDateOfShift()
    {
        return $this->dateofshift;
    }
}
