<?php
/**
 * Created by PhpStorm.
 * User: Kyle_Staples
 * Date: 4/25/19
 * Time: 12:38 PM
 */

?>
@if (count($breadcrumbs))
    <ul class="list-unstyled list-inline au-breadcrumb__list">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="list-inline-item active">
                    <a href="{{ $breadcrumb->url }}" style="color:#3490dc;">{{ $breadcrumb->title }}</a>
                </li>
                <li class="list-inline-item seprate">
                    <span>/</span>
                </li>
            @else
                <li class="list-inline-item">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>
@endif




