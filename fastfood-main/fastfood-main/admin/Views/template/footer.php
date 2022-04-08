<footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#">
                  Creative 1
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
        
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="resource/js/core/jquery.min.js"></script>
  <script src="resource/js/core/popper.min.js"></script>
  <script src="resource/js/core/bootstrap.min.js"></script>
  <script src="resource/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->

  <!-- Chart JS -->
  <script src="resource/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="resource/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="resource/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="resource/demo/demo.js"></script>
  <script>
    <?php
      $dataCurrent = array();
      $timeCurrent = array();
      if(isset($billCurrnetData)){
        foreach($billCurrnetData as $value){
          array_push($dataCurrent,(int)$value["Number"]);
          array_push($timeCurrent,(int)$value["Hour"]);
        }
      }

      $venenueData = array();
      $venenueTime = array();
      if(isset($venenueCurrentStore)){
        foreach($venenueCurrentStore as $value){
          array_push($venenueData,(int)$value["Sum"]);
          array_push($venenueTime,(int)$value["Hour"]);
        }
      }
    ?>

    $(document).ready(function() {
      let dataCurrent = <?php echo json_encode($dataCurrent); ?>;
      let timeCurrent = <?php echo json_encode($timeCurrent); ?>;
      let venenueData = <?php echo json_encode($venenueData); ?>;
      let venenueTime = <?php echo json_encode($venenueTime); ?>;
      // Javascript method's body can be found in assets/js/demos.js
      
      setTimeout(function(){ chartVenenue.innit2(venenueData,venenueTime);}, 1000);
      demo.initDashboardPageCharts(dataCurrent,timeCurrent);
      
      

    });
  </script>
</body>

</html>