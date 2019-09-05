@include('header')

@if(\Illuminate\Support\Facades\Session::has('message'))
    {{ \Illuminate\Support\Facades\Session::get('message') }}
@endif

<div class="header">
    Event
    <a id="edit-event" href="/edit/{{ $event->id }}">Edit event</a>
</div>

<div class="body">
    <table>
        <tbody>
            <tr>
                <th>Title</th>
                <td class="event-title">{{ $event->title }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td class="event-description">{{ $event->description }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td class="event-date">{{ date('d.m.Y', strtotime($event->date)) }}</td>
            </tr>
            <tr>
                <th>Time</th>
                <td class="event-time">{{ $event->time }}</td>
            </tr>
            <tr>
                <th>Duration (days)</th>
                <td class="event-duration-days">{{ $event->duration_days }}</td>
            </tr>
            <tr>
                <th>Location</th>
                <td class="event-location">{{ $event->location }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td class="event-price">{{ $event->standard_price }}.-</td>
            </tr>
            <tr>
                <th>Capacity</th>
                <td class="event-capacity">{{ $event->capacity }}</td>
            </tr>
            <tr>
                <th>Sessions</th>
                <td class="event-sessions">
                    <ul>
                        @foreach($event->sessions as $session)
                        <li>
                            {{ $session->title }} in {{ $session->room }} with {{ $session->speaker }}
                        </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</div>
