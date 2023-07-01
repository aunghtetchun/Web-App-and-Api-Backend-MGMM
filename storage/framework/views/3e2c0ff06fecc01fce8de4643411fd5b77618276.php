<?php $__env->startSection("title"); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <?php if(\Session::has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(\Session::get('error')); ?>

                    </div>
                <?php endif; ?>

                <div class="card-header">Admin Dashboard</div>

                <div class="card-body d-flex flex-wrap">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                        <!-- <div class="col-12 col-lg-6 col-md-6">
                            <canvas id="myChart" ></canvas>
                        </div> -->
                    <div class="col-12 colmd-6" style="overflow:scroll;">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">နာမည်</th>
                                <th scope="col">ဂိမ်းအရေအတွက်</th>
                                <th scope="col">ကြည့်ရှုသူ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->post_count); ?> ဂိမ်း</td>
                                <td><?php echo e($user->related_post_count); ?> ယောက်</td>
                                </tr>
                                <tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                            </table>
                        </div>
                    <div class="col-12 colmd-6" style="overflow:scroll;">
                        
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ဂိမ်းနာမည်</th>
                                <th scope="col">ကြည့်ရှုသူ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <td><?php echo e($g->name); ?></td>
                                <td><?php echo e($g->count); ?> ယောက်</td>
                                </tr>
                                <tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                            </table>
                        </div>
                        
                        <!-- <div class="col-12 col-lg-6 col-md-6">
                            <h4>လူကြိုက်များဆုံးဂိမ်းဆယ်ခု</h4>
                            <?php echo e(\App\Post::with('getViewer')->get('name')); ?>

                        </div> -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('foot'); ?>
    <!-- <script>
        var url = "<?php echo e(url('stock/chart')); ?>";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function(){
            $.get(url, function(response){
                response.forEach(function(data){
                    Years.push(data.name);
                    Labels.push(data.id);
                    Prices.push(data.get_viewer_count);
                });
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:Years,
                        datasets: [{
                            label: 'Viewers',
                            data: Prices,
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
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    callback: function (tick) {
                                        return tick.substring(0, 9);
                                    }
                                },
                                tooltips: {
                                    callbacks: {
                                        title: function (tooltipItems, data) {
                                            return data.labels[tooltipItems[0].index]
                                        }
                                    }
                                }
                            }],
                        },
                    }
                });
            });
        });
    </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
   <script> -->



































<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/modgamesmm/resources/views/home.blade.php ENDPATH**/ ?>