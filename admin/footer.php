        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <script>document.write(new Date().getFullYear())</script>.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>

  <!-- Ck Editor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
          ckfinder: {
            uploadFile: '../file.php'
          }
        } )
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.log( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#editor2' ), {
          ckfinder: {
            uploadFile: '../file.php'
          }
        } )
        .then(editor => {
          console.log(editor);
        })
        .catch( error => {
            console.log( error );
        } );
  </script>

  <!-- Sweet Alert -->
  <script>
    <?php if(isset($_SESSION['sweetalertText'])){

       $data = $_SESSION['sweetalertText'];
        
    ?>
      $(document).ready(function(){
          swal({
              title: "<?=$data['title']?>",
              text: "<?=$data['text']?>",
              icon: "<?=$data['icon']?>",
              button: "<?=$data['button']?>",
          })

      });

    <?php unset($_SESSION['sweetalertText']); } ?>

  </script>

  <!-- End custom js for this page-->
</body>

</html>

