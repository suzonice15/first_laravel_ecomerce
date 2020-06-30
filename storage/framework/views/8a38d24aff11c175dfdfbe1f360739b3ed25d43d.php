<footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div>
                    <div class="module-body">
                        <?= get_option('address') ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">Login/Registration</a></li>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                            <li><a href="#" title="About us">Order History</a></li>
                            <li><a href="#" title="About us">Track Order </a></li>
                            <li><a href="#" title="faq">FAQ</a></li>
                             <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a title="Your Account" href="#">About us</a></li>
                            <li><a title="Information" href="#">Customer Service</a></li>
                            <li><a title="Addresses" href="#">Company</a></li>
                            <li><a title="Addresses" href="#">Investor Relations</a></li>
                            <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Company">Company</a></li>
                            <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                            <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                    <li class="fb pull-left"><a target="_blank" rel="nofollow" href="<?=get_option('facebook')?>" title="Facebook"></a></li>
                    <li class="tw pull-left"><a target="_blank" rel="nofollow" href="<?=get_option('twitter')?>" title="Twitter"></a></li>
                       <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="<?=get_option('linked')?>" title="Linkedin"></a></li>
                    <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="<?=get_option('youtube')?>" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <h4 style="color:white">@copyright  2020 - <?=date('Y')?> Devoloped by <a  style="color:white" href="" target="_blank">Shahinul Islam Sujon</a></h4>
            </div>
        </div>
    </div>
</footer>


<div id="myModalPopUp" class="modal fade">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" style="color:red;font-size:25px" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>


            </div>
            <div class="modal-body">
                <a href="https://www.village-bd.com/asus-laptop-15-x509ja-10th-gen-intel-core-i3-1005g1-4gb-ddr4-1tb-hdd-15-6-inch-fhd-display-finger-print-sensor-slate-grey-notebook-ej050t">
                    <img src="https://www.village-bd.com/uploads/sdfgxfc.jpg" style="width: 100%;">
                </a>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo e(asset('assets/font_end/')); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/echo.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/jquery.easing-1.3.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/bootstrap-slider.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/font_end/')); ?>/js/lightbox.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/bootstrap-select.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/wow.min.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/scripts.js"></script>
<script src="<?php echo e(asset('assets/font_end/')); ?>/js/jquery_cokie.js"></script>
 <script>
    $(document).ready(function(){
        //$.cookie("popup_open", "Aurelio");
        // var popub_modal= $.cookie("popup_open");
        //   if(typeof popub_modal === "undefined") {
        //     $("#myModalPopUp").modal('show');
        // } else {
        //
        //
        //     $("#myModalPopUp").modal('hide');
        // }
        //
        // $.cookie('popup_open', 'sujon', { expires: 1, path: '/' });
        $("#myModalPopUp").modal('hide');
        setTimeout(function(){

            $("#myModalPopUp").modal('hide');
        }, 5000);
    });
</script>
<script>
 //   $("#zoom_04").ezPlus();
    $('.main_parent_category').on('click',function () {
        let href= this.href;
       window.open(href,'_self')
    });
    $('body').click(function () {
        $("#search .dropdown-menu").hide();
    })
    </script>



<script>

    $('#searc_query').on('input',function () {
       var search_query=$(this).val();
        if (search_query.length >= 1) {


            jQuery.ajax({
                type:"GET",
                url: "<?php echo e(url('search_engine/')); ?>?search_query="+search_query,
                success:function(data)
                {
                    $("#search .dropdown-menu").show();
                    jQuery("#search .dropdown-menu").html(data.html);
                }
            });
        } else {
            jQuery(".dropdown-menu").html('');

        }
    });
    $(document).on('click','.add-to-wishlist',function () {
        let product_id=  $(this).data("product_id"); // will return the number 123
        $(this).css("background-color", "red");

        $.ajax({
            type:"GET",
            url:"<?php echo e(url('add-to-wishlist')); ?>?product_id="+product_id,
            success:function(data)
            {


            }
        })

    })
</script>
<script>
    $(document).on('click','.add_to_cart',function () {
        let product_id=  $(this).data("product_id"); // will return the number 123
        let picture=  $(this).data("picture"); // will return the number 123

        let quntity =$('#quantity_of_sell').val();

        if(typeof quntity ==='undefined'){
            quntity=1;
        } else {
            quntity=quntity;
        }

        $.ajax({
            type:"GET",
            url:"<?php echo e(url('add-to-cart')); ?>?product_id="+product_id+"&picture="+picture+"&quntity="+quntity,

            success:function(data)
            {

                 $('body .count').text(data.result.count);
                 $('body .value').text(data.result.total);
            }
        })

    })
</script>
<script>
    $(document).on('click','.buy-now-cart',function () {
        let product_id=  $(this).data("product_id"); // will return the number 123
        let picture=  $(this).data("picture"); // will return the number 123
        let quntity =$('#quantity_of_sell').val();

        if(typeof quntity ==='undefined'){
            quntity=1;
        } else {
            quntity=quntity;
        }
         $.ajax({
            type:"GET",
             url:"<?php echo e(url('add-to-cart')); ?>?product_id="+product_id+"&picture="+picture+"&quntity="+quntity,
            success:function(data)
            {
                 window.location.assign("<?php echo e(url('/')); ?>/checkout")
                $('body .count').text(data.result.count);
                $('body .value').text(data.result.total);
            }
        })

    })
</script>

</body>
</html>

<?php /**PATH C:\Xampp\htdocs\first_laravel_ecomerce\resources\views/website/includes/footer.blade.php ENDPATH**/ ?>