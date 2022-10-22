<?php 

    require_once 'includes/header.php';
    require_once 'includes/report.php';
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
        exit();
    }
    if($_SESSION['user_type'] === "user"){
        header("location: index.php");
        exit();
    }
    //include_once 'includes/dashboardstats.inc.php';

 ?>

    <div class="row ">
        <div class="col-md-12 content-margin-top">
                <div class="col">
                    <div class="card overflow-auto row animated fadeInLeft">
                        <div class="card-body">
                            <h3>Manage Reports</h3>
                            <div class="row">
                                <div class="col">
                                    <div class="card dashboard-card">
                                        <div class="card-body">
                                            <h5>Daily</h5>
                                            <h2>₱ <?php echo daily_report() ?></h2>
                                            <a class="view-details text-center" href="#">View details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card dashboard-card">
                                        <div class="card-body">
                                            <h5>Revenue (Weekly)</h5>
                                            <h2>₱ <?php echo weekly_report(); ?></h2>
                                            <a class="view-details text-center" href="#">View details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class='table table-striped mt-2'>
                                <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Daily</th>
                                    <th>Weekly</th>
                                    <th>Monthly</th>
                                    <th>Date Generated</th>
                                </tr>
                                    
                                </thead>
                                <tbody>
                                    <?php selectReports(); ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col">
                    
                </div>
            </div>
        
        </div>
        <div class="row mt-3 animated fadeInUp">
            <div class="col">
                <a href="includes/generateReport.php" class="btn btn-dark f-forms">Generate Report</a>
            </div>
        </div>
    </div>
    </form>
        </div>
    </div>
    
<?php include_once 'includes/footer.php' ?>