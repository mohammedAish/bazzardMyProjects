<x-admin-layout>
        <div class="container row">
            <div class="col-md-4 col-sm-12 pt-5 text-center">
                <div class="  py-4 " style="background-color:#212529;color:#fff; width:200px;height:150px;font-size: 20px;border-radius: 20%;">
                    <div class="inner">
                        <h3 style="font-size: 50px;">{{$order_count}}</h3>
                        <p> Number Of Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <canvas id="myChart" width="100%" height="50"></canvas>
            </div>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Monthly distribution of Orders' ,
                data: {!! json_encode($result)!!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }],
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
</x-admin-layout>
