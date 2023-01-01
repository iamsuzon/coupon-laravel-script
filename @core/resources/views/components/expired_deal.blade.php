@php
    $date_now = \Carbon\Carbon::today();
    $expire_date = $deal->expire_date;
    $interval = $date_now->diff($expire_date);
    $days = $interval->format('%d');
@endphp