<?php

use Vinkla\Hashids\Facades\Hashids;

function encodeHashIds($id)
{
    return Hashids::connection("main")->encode($id);
}
function decodeHashIds($id)
{
    if (count(Hashids::connection("main")->decode($id)) > 0) {
        return isset(Hashids::connection("main")->decode($id)[0]) ? Hashids::connection("main")->decode($id)[0] : null;
    } else {
        return abort(500);
    }
}