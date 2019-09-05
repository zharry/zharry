@include('header')

<div class="header">
    Event Ratings
</div>

<div class="body">
    <canvas id="chart"></canvas>
    <script src="{{ URL::asset('chartjs/chart.js') }}"></script>
    <script>
        // For a pie chart
        var myPieChart = new Chart(document.getElementById('chart').getContext('2d'), {
            type: 'pie',
            data: {
                datasets: [{
                    data: [ {{ $ratings[2] }}, {{ $ratings[1] }}, {{ $ratings[0] }}],
                    backgroundColor: ["green", "yellow", "red"]
                }],
                labels: [
                    '2: {{ $percentages[2] }}',
                    '1: {{ $percentages[1] }}',
                    '0: {{ $percentages[0] }}'
                ]
            }
        });
    </script>
</div>
