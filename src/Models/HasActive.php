<?php

namespace LaraZeus\Core\Models;

use Carbon\Carbon;

trait HasActive
{
    public function getIsActiveDescAttribute()
    {
        return ($this->is_active === 0)
            ? '<span class="text-xs text-red-800 rounded-full bg-red-100 px-2.5 py-0.5 font-semibold">'.__('Inactive').'</span>'
            : '<span class="text-xs text-green-800 rounded-full bg-green-100 px-2.5 py-0.5 font-semibold">'.__('Active').'</span>';
    }
}
