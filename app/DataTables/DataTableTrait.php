<?php

namespace App\DataTables;

trait DataTableTrait
{
    public function badge($text, $type, $margin = 0): string
    {
        return <<<'HTML'
<span class="badge badge-
HTML
 . $type . ' ml-' . $margin . '">' . __($text) . '</span>';
    }

    public function button($route, $param, $type, $title, $icon, $name = '', $target = '_self'): string
    {
        return <<<'HTML'
<a
                    title="
HTML
. $title . '"
                    data-name="' . $name . '"
                    href="' . route($route, $param) . '"
                    class="px-3 btn btn-xs btn-' . $type . '"
                    target="' . $target . '">
                    <i class="far fa-' . $icon . '"></i>
                </a>';
    }
}
