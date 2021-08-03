Hi {{$name}}

The details of the {{$event->name}} has been changed to  {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }} {{ \Carbon\Carbon::parse($event->time)->toTimeString() }} WAT
{{$event->location}}