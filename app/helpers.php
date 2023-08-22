<?php

function currency_format($amount)
{
    return number_format($amount, 2, ',', '.');
}