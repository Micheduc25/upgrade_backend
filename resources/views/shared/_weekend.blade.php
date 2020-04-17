@inject('date', 'App\Utilities\Date')


@if($date->isWeekend())
    {{"C'est le weekend"}}
@else
    {{"Ce n'est pas le weekend"}}
@endif