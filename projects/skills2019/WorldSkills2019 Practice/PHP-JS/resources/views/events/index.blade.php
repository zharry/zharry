@include('header')

@if(\Illuminate\Support\Facades\Session::has('create_message'))
    {{ \Illuminate\Support\Facades\Session::get('create_message') }}
@endif
@if(\Illuminate\Support\Facades\Session::has('message'))
    {{ \Illuminate\Support\Facades\Session::get('message') }}
@endif


<div class="header">
    Events
    <a id="add-event" href="/add">Add event</a>
</div>

<div class="content">
    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr class="event">
                <td class="event-title">
                    <a href="/detail/{{ $event->id }}">{{ $event->title }}</a>
                </td>
                <td class="event-date">{{ date('d.m.Y', strtotime($event->date)) }}</td>
                <td class="event-price">{{ $event->standard_price }}.-</td>
                <td class="event-actions">
                    <a class="event-participants" href="/attendee/{{ $event->id }}">Participants list</a>
                    <a class="event-ratings" href="/rating/{{ $event->id }}">Rating diagram</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
