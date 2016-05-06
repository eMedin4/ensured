<?php

namespace Ensured\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class HeaderComposer
{

    public function compose(View $view)
    {

        $view->with(['dateformat' => $this->createformat(), 'tagTrends' => $this->tagTrends()]);
    }

    public function createformat()
    {
        $today = rtrim(Carbon::today()->formatLocalized('%A %e'), '.');
        $tomorrow = rtrim(Carbon::tomorrow()->formatLocalized('%A %e'), '.');
        $week = rtrim(Carbon::today()->formatLocalized('%e %b'), '.') . ' - ' . rtrim(Carbon::today()->addWeek()->formatLocalized('%e %b'), '.');
        $weekend = rtrim(Carbon::today()->parse('next saturday')->formatLocalized('%e %b'), '.') . ' - ' . rtrim(Carbon::today()->parse('next sunday')->formatLocalized('%e %b'), '.');
        $month = rtrim(Carbon::today()->formatLocalized('%e %b'), '.') . ' - ' . rtrim(Carbon::today()->addMonth()->formatLocalized('%e %b'), '.');
         

        return $dateformat = [
            'today' => $today,
            'tomorrow' => $tomorrow,
            'week' => $week,
            'weekend' => $weekend,
            'month' => $month 
            ];
    }

    public function tagTrends()
    {
        return $tags = ['cine', 'peliculas', 'fiestas', 'moda', 'belleza', 'cerveza', 'vino', 'comida' ];
    }

}
