<?php
include('include/header.php');
include('include/navbar.php');
?>

<style>
    .table {
        color: #000;
    }

    .top {
        margin-left: 20px;
        margin-bottom: 20px;
        color: #000;
    }

    /* no scholar */
    .blockquote-custom {
        color: #000;
        margin-top: -200px;
        position: relative;
        font-size: 1.3rem;
        width: 600px;
        height: 100px;
        margin-left: -70px;
        border-radius: 1.25rem;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.775);
    }

    .blockquote-custom-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: -40px;
        left: 19px;
    }

    .infobtn {
        font-weight: bold;
        text-decoration: none;
    }

    .modal {
        border-radius: 15px;
    }
</style>


<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filter year</h5>

                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">From date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="From date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To date</label>
                                        <input type="date" name="to_date" class="form-control" placeholder="From date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Check</label><br>
                                        <button type="submit" name="sort" class="btn btn-primary">Filter Data </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h6>project list</h6>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>published details</th>
                                    <th>publication date</th>
                                    <th>Show detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($_GET['from_date']) && isset($_GET['to_date']))
                                     {

                                        echo $from_date = $_GET['from_date'];
                                        $from_date = $_GET['to_date'];
                                    }
                                

                                ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






       



<?php
include('include/scripts.php');
include('include/footer.php');
?>