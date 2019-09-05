@include('header')

<div class="header">
    Create new event
</div>

<div class="body">
    <form method="POST" action="/add">
        @csrf
        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </div>

        <div>
            <label for="date">Date</label>
            <input id="date" type="date" name="date">
        </div>

        <div>
            <label for="time">Time</label>
            <input id="time" type="time" name="time">
        </div>

        <div>
            <label for="duration_days">Duration (days)</label>
            <input id="duration_days" type="number" name="duration_days">
        </div>

        <div>
            <label for="location">Location</label>
            <input id="location" type="text" name="location">
        </div>

        <div>
            <label for="standard_price">Price</label>
            <input id="standard_price" type="number" name="standard_price">
        </div>

        <div>
            <label for="capacity">Capacity</label>
            <input id="capacity" type="number" name="capacity">
        </div>

        <div>
            <label>Sessions</label>
            <div>
                <button id="add-session" type="button" onclick="addSession()">Add session</button>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Speaker</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <button type="submit" id="create-event">
                Create
            </button>
        </div>
    </form>

    <script>
        let sessions = 0;
        function addSession() {
            const newRow = document.createElement("tr");
            newRow.classList.add("session");
            newRow.innerHTML = ''+
                '<td><input type="text" name="sessions[' + sessions + '][title]"></td>\n' +
                '<td><input type="text" name="sessions[' + sessions + '][time]"></td>\n' +
                '<td><input type="text" name="sessions[' + sessions + '][room]"></td>\n' +
                '<td><input type="text" name="sessions[' + sessions + '][speaker]"></td>\n';
            document.getElementById("tableBody").appendChild(newRow);
            sessions++;
        }
    </script>
</div>
