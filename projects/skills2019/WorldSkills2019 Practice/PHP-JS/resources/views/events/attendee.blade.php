@include('header')

<div class="header">
    Event Attendees
</div>

<div class="body">
    <table>
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Photo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendees as $attendee)
            <tr class="attendee">
                <td class="attendee-fn">{{ $attendee->firstname }}</td>
                <td class="attendee-ln">{{ $attendee->lastname }}</td>
                <td class="attendee-email">{{ $attendee->email }}</td>
                <td class="attendee-photo">{{ $attendee->photo }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
