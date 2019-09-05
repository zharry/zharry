@include('header')

@if(\Illuminate\Support\Facades\Session::has('message'))
    {{ \Illuminate\Support\Facades\Session::get('message') }}
@endif

<div class="header">
    Edit event
</div>

<div class="content">
    <form method="POST" action="/edit/{{ $event->id }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="{{ $event->title }}">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ $event->description }}</textarea>
        </div>

        <div>
            <label for="date">Date</label>
            <input id="date" type="date" name="date" value="{{ $event->date }}">
        </div>

        <div>
            <label for="time">Time</label>
            <input id="time" type="time" name="time" value="{{ $event->time }}">
        </div>

        <div>
            <label for="duration_days">Duration (days)</label>
            <input id="duration_days" type="number" name="duration_days" value="{{ $event->duration_days }}">
        </div>

        <div>
            <label for="location">Location</label>
            <input id="location" type="text" name="location" value="{{ $event->location }}">
        </div>

        <div>
            <label for="standard_price">Price</label>
            <input id="standard_price" type="number" name="standard_price" value="{{ $event->standard_price }}">
        </div>

        <div>
            <label for="capacity">Capacity</label>
            <input id="capacity" type="number" name="capacity" value="{{ $event->capacity }}">
        </div>

        <div>
            <button type="submit" id="save-event">
                Save
            </button>
        </div>
    </form>
</div>
