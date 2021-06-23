<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Login</h1>
                    <div class="px-2">
                        <form action="" class="justify-content-center" method="post" action="<?php echo base_url(); ?>login">
                            <div class="form-group">
                                <label class="sr-only">Username</label>
                                <input type="email" name="username" class="form-control" placeholder="mail@domain.com" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-key"></i> Login</button>

                            <a href="<?php echo base_url(); ?>login?google=true"class="btn btn-danger btn-lg btn-block"><i class="fa fa-google"></i>  Google Signin</a>
                            <!-- <a href="<?php echo base_url(); ?>login/reset"  class="btn btn-primary btn-lg btn-block">Reset</a> -->

                        </form>
                        <?php if (!empty($this->session->flashdata('error'))) {?>
                            <br />
                           <span class="alert-link text-white"><i><?php echo $this->session->flashdata('error'); ?></i></span>

                        <?php }?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script>

</script>