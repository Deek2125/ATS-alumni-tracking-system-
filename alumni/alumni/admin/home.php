<?php include 'db_connect.php' ?>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


<style>
    /* body {
        background: linear-gradient(to left, #000000, #00d4ff);
    } */

    span.float-right.summary_icon {
        font-size: 3rem;
        position: absolute;
        right: 1rem;
        color: #ffffff96;
    }

    .imgs {
        margin: .5em;
        max-width: calc(100%);
        max-height: calc(100%);
    }

    .imgs img {
        max-width: calc(100%);
        max-height: calc(100%);
        cursor: pointer;
    }

    #imagesCarousel,
    #imagesCarousel .carousel-inner,
    #imagesCarousel .carousel-item {
        height: 60vh !important;
        background: black;
    }

    #imagesCarousel .carousel-item.active {
        display: flex !important;
    }

    #imagesCarousel .carousel-item-next {
        display: flex !important;
    }

    #imagesCarousel .carousel-item img {
        margin: auto;
    }

    #imagesCarousel img {
        width: auto !important;
        height: auto !important;
        max-height: calc(100%) !important;
        max-width: calc(100%) !important;
    }

    #companiesChart {
        max-width: 600px;
        /* Adjust the chart width as needed */
        margin: 0 auto;
    }
</style>

<div class="containe-fluid">
    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <font face=cursive><b><?php echo "Welcome to the " . $_SESSION['login_name'] . "Panel. Manage and oversee your system with ease." ?></b></font>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT * FROM alumnus_bio where status = 1")->num_rows; ?>
                                            </b></h4>
                                        <p><b>Alumni</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-comments"></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT * FROM forum_topics")->num_rows; ?>
                                            </b></h4>
                                        <p><b>Forum Topics</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-briefcase"></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT * FROM careers")->num_rows; ?>
                                            </b></h4>
                                        <p><b>Posted jobs</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-calendar-day"></i></span>
                                        <h4><b>
                                                <?php echo $conn->query("SELECT * FROM events where date_format(schedule,'%Y-%m%-d') >= '" . date('Y-m-d') . "' ")->num_rows; ?>
                                            </b></h4>
                                        <p><b>Upcoming Events</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <?php
                                        $connected_to = 'Infosys'; // Replace 'XYZ' with the specific company code you're interested in
                                        $query = "SELECT COUNT(*) FROM alumnus_bio WHERE connected_to = '$connected_to'";
                                        $result = $conn->query($query);
                                        $employeeCount = $result->fetch_row()[0];
                                        ?>
                                        <h4><b>
                                                <?php echo $employeeCount; ?>
                                            </b></h4>
                                        <p><b>Total Alumnis at
                                                <?php echo $connected_to; ?> Company
                                            </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <?php
                                        $connected_to = 'Wipro'; // Replace 'XYZ' with the specific company code you're interested in
                                        $query = "SELECT COUNT(*) FROM alumnus_bio WHERE connected_to = '$connected_to'";
                                        $result = $conn->query($query);
                                        $employeeCount = $result->fetch_row()[0];
                                        ?>
                                        <h4><b>
                                                <?php echo $employeeCount; ?>
                                            </b></h4>
                                        <p><b>Total Alumnis at
                                                <?php echo $connected_to; ?> Company
                                            </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <?php
                                        $batch = '2014'; // Replace '2022' with the specific graduation year you're interested in
                                        $query = "SELECT COUNT(*) FROM alumnus_bio WHERE batch = '$batch'";
                                        $result = $conn->query($query);
                                        $alumnusCount = $result->fetch_row()[0];
                                        ?>
                                        <h4><b>
                                                <?php echo $alumnusCount; ?>
                                            </b></h4>
                                        <p><b>Total Alumnis Graduating in
                                                <?php echo $batch; ?>
                                            </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <?php
                                        $connected_to = 'Google'; // Replace 'XYZ' with the specific company code you're interested in
                                        $batch = '2020'; // Replace '2022' with the specific graduation year you're interested in
                                        $query = "SELECT COUNT(*) FROM alumnus_bio WHERE connected_to = '$connected_to' AND batch = '$batch'";
                                        $result = $conn->query($query);
                                        $employeeCount = $result->fetch_row()[0];
                                        ?>
                                        <h4><b>
                                                <?php echo $employeeCount; ?>
                                            </b></h4>
                                        <p><b>Total Alumnis at
                                                <?php echo $connected_to; ?> Graduated in
                                                <?php echo $batch; ?>
                                            </b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <canvas id="companiesChart" width="600" height="300"></canvas>
                        <?php
                        $companiesData = array();
                        $labels = array();
                        $data = array();

                        $companiesQuery = $conn->query("SELECT connected_to, COUNT(*) as alumniCount FROM alumnus_bio GROUP BY connected_to");
                        while ($row = $companiesQuery->fetch_assoc()) {
                            $labels[] = $row['connected_to'];
                            $data[] = $row['alumniCount'];
                        }
                        ?>
                        < <script src="https://cdn.jsdelivr.net/npm/chart.js">
                            </script>
                            <script>
                                // Chart.js code for companies chart
                                var ctxCompanies = document.getElementById('companiesChart').getContext('2d');
                                var companiesChart = new Chart(ctxCompanies, {
                                    type: 'bar',
                                    data: {
                                        labels: <?php echo json_encode($labels); ?>,
                                        datasets: [{
                                            label: 'Number of Alumni',
                                            data: <?php echo json_encode($data); ?>,
                                            backgroundColor: 'rgba(75, 192, 192, 0.8)', // Adjust the color as needed
                                            borderWidth: 1
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
            </div>
        </div>
    </div>
</div>
<script>

    $('#manage-records').submit(function (e) {
        e.preventDefault()
        start_load()
        $.ajax({
            url: 'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function (resp) {
                resp = JSON.parse(resp)
                if (resp.status == 1) {
                    alert_toast("Data successfully saved", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 800)

                }

            }
        })
    })
    $('#tracking_id').on('keypress', function (e) {
        if (e.which == 13) {
            get_person()
        }
    })
    $('#check').on('click', function (e) {
        get_person()
    })
    function get_person() {
        start_load()
        $.ajax({
            url: 'ajax.php?action=get_pdetails',
            method: "POST",
            data: { tracking_id: $('#tracking_id').val() },
            success: function (resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    if (resp.status == 1) {
                        $('#name').html(resp.name)
                        $('#address').html(resp.address)
                        $('[name="person_id"]').val(resp.id)
                        $('#details').show()
                        end_load()

                    } else if (resp.status == 2) {
                        alert_toast("Unknow tracking id.", 'danger');
                        end_load();
                    }
                }
            }
        })
    }
</script>

<!--Add charts
<div class="graphBox">
    
    <div class =  "box"></div>
    <canvas id="myChart"></canvas>
    <div class = "box"></div>
</div>-->