<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" >
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>" >
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>" >
<div class="main">
    <div class="container">
        <center>
            <div class="middle">
                <div id="login">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <fieldset class="clearfix">
                            <p ><span class="fa fa-user"></span><input name ="email" id="email" type="email"  class="<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" Placeholder="E-Mail" value="<?php echo e(old('email')); ?>" autocomplete="email" required autofocus></p> 
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>


                            <p><span class="fa fa-lock"></span><input name="password" type="password"  class="<?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" Placeholder="Clave" required autocomplete="current-password"></p>
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                             <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            <div>
                                <span style="width:50%; text-align:right;  display: inline-block;"><button>Ingresar</button></span>
                            </div>
                        </fieldset>
                        <div class="clearfix"></div>
                    </form>
                    <div class="clearfix"></div>
                </div> <!-- end login -->
                <div class="logo">
                    <div class="clearfix"><img width="150px" heigth="150px" src="<?php echo e(asset('images/escudo.png')); ?>"</div>
                </div>
            </div>
        </center>
    </div>
</div><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/auth/login.blade.php ENDPATH**/ ?>