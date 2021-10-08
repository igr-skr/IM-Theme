<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package im-theme
*/
?>
</div>
</div>
</div>
  <footer id="colophon" class="site-footer container" role="contentinfo">
    <div class="container">
      <div class="row footer-wrapper">
        <div class="footer-wrapper-inner">
          <?php if ( is_active_sidebar( 'footer-col-1' ) ) : ?>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-col-1' ); ?>
          </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-col-2' ) ) : ?>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-col-2' ); ?>
          </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-col-3' ) ) : ?>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-col-3' ); ?>
          </div>
          <?php endif; ?>
          <?php if ( is_active_sidebar( 'footer-col-4' ) ) : ?>
          <div class="col-sm-3">
            <?php dynamic_sidebar( 'footer-col-4' ); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="disclaimer">
        <div class="disclaimer-inner">
          <div class="site-info">
            2018 - <?php echo date("Y"); ?> © Copyrights Nano Mobility Official
          </div>
          <!-- .site-info -->
          <div class="payments-footer">
            <span class="card-visa">
            </span>
            <span class="card-mastercard">
            </span>
            <span class="card-amex">
            </span>
            <span class="sveaekonomi">
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- .col-full -->
  </footer>
  <!-- #colophon -->
  </div>
<!-- #page -->
<?php wp_footer(); ?>

<script>
        
        jQuery(document).ready(function($){

          $('#site_header').stickySidebar({
            topSpacing: 0,
            bottomSpacing: 0
          });

        });
        
      </script>


<script>
        
        jQuery(document).ready(function($){

          $('#secondary').stickySidebar({
            topSpacing: 120,
            bottomSpacing: 20
          });

        });
        
      </script>



      <script>
        
        jQuery(document).ready(function($){

          $("#navToggle").click(function() {
    $(this).toggleClass("active");
    $(".overlay").toggleClass("open");
    // this line ▼ prevents content scroll-behind
    $("body").toggleClass("locked"); 
});

        });
        
      </script>

</body>
</html>