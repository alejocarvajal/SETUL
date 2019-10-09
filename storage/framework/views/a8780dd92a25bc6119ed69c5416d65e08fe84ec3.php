<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 5.8 Import Export Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="<?php echo e(route('export')); ?>">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   
</body>
</html><?php /**PATH F:\SETUL\resources\views/import.blade.php ENDPATH**/ ?>