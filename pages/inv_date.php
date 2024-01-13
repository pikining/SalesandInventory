<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
// require_once('../includes/function.php');

  ?>   

<div class="row">

  <div class="col-md-6" align="center">
    <div class="card shadow col-md-20 mb-4">
        <div class="card-body">
        <h5 class="m-2 font-weight-bold text-primary" align="center">Date Range</h5>
            <form method="post" action="inv_report_date.php">
                <div class="form-group">
                    <div class="row">
                      <div class="col-6 form-group">
                        <h6 align="center">
                          From
                        </h6>
                        <input type="date" class="form-control" placeholder="From" name="start-date" required>
                      </div>
                      <div class="col-6 form-group">
                        <h6 align="center">
                          To
                        </h6>
                        <input type="date" class="form-control" placeholder="To" name="end-date" required>
                      </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
            </form>
        </div>  
    </div>  
    </div>

</div>

<?php
include'../includes/footer.php';
?>