<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col card" style="width: 10rem; height: 14rem;">
                <a href="{{ url('/mqtt/1') }}" class="btn btn-primary">Inverter 1</a>
                <a href="{{ url('/mqtt/2') }}" class="btn btn-primary">Inverter 2</a>
                <a href="{{ url('/mqtt/3') }}" class="btn btn-primary">Inverter 3</a>
                <a href="{{ url('/mqtt/4') }}" class="btn btn-primary">Inverter 4</a>
                <a href="{{ url('/mqtt/5') }}" class="btn btn-primary">Inverter 5</a>
            </div>
            <div class="col card" style="width: 10rem; height: 14rem;">
                <a href="{{ url('/mqtt/6') }}" class="btn btn-primary">Inverter 6</a>
                <a href="{{ url('/mqtt/7') }}" class="btn btn-primary">Inverter 7</a>
                <a href="{{ url('/mqtt/8') }}" class="btn btn-primary">Inverter 8</a>
                <a href="{{ url('/mqtt/9') }}" class="btn btn-primary">Inverter 9</a>
                <a href="{{ url('/mqtt/10') }}" class="btn btn-primary">Inverter 10</a>
            </div>
        </div>
        <div class="card" style="width: 90rem; height: 40rem;">
            <canvas id="myChart" height="100"></canvas>
            
            <script>
                var canvas = document.getElementById('myChart');
                canvas.style.width = '200px'; // Set the width using JavaScript
                canvas.style.height = '100px'; // Set the width using JavaScript
                
                var ctx = canvas.getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        
                        labels: {!! json_encode($timestamps) !!},
                        datasets: [{
                            label: 'Active Power (kW)',
                            data: {!! json_encode($adjustedPowers) !!},
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
    
</body>
</html>
