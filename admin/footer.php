
  <!-- footer section : starts -->
      <div id="footer">
          <div class="container">
            <div class="row py-4">

              <!-- contact info -->
              <div class="col-md-4 mb-3">
                <span><strong> Contact Us : </strong></span> <br/><br/>
                  <span class="fa fa-location-arrow fa-fw"></span><em class="text-muted"> 12 suleman street, Auchi, Edo State.</em>
                  <br/><br/>
                   <span class="fa fa-phone fa-fw"></span><em class="text-muted">+2348063498356</em>
                  <br/><br/>
                   <span class="fa fa-envelope fa-fw"></span><em class="text-muted"> support@myschool.com</em>
                  <br/><br/>

                <!-- social media -->
                <p><strong>Follow Us : </strong></p>
                  <a href="#"><span class="fa fa-facebook fa-fw"></span></a>
                  <a href="#"><span class="fa fa-twitter fa-fw"></span></a>
                  <a href="#"><span class="fa fa-linkedIn fa-fw"></span></a>
                  <a href="#"><span class="fa fa-instagram fa-fw"></span></a>

              </div>
              <!-- info -->
              <div class="col-md-3 mb-3">
                  <p><strong>Featured</strong></p>
                  <a href="#" class="text-muted"> About Us </a> <br/><br/>
                  <a href="#" class="text-muted"> Gallery </a> <br/><br/>
                  <a href="#" class="text-muted"> News </a> <br/><br/>
                  <a href="#" class="text-muted"> Patnership </a><br/><br/>
                  <a href="#" class="text-muted"> Sponsors </a>
              </div>

              <!-- drop a messeage -->
              <div class="col-md-5 mb-3">
                  <form method="post" action="index.php">
                    <fieldset class="bg-light p-5">
                        <p class="text-muted"><strong> We Would Love To Hear From You... </strong></p>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="name-field"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Name" aria-label="username" aria-describedby="name-field">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="email-field"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email-field" required>
                        </div>
                        <br/>
                        <div class="input-group">
                             <textarea class="form-control" name="msg" rows="3" placeholder="Message" required></textarea>
                        </div>
                        <br/>
                        <button class="btn btn-danger btn-block" type="submit" name="submit">Submit form</button>
                    </fieldset>
                  </form>
              </div>
            </div>

            <div class="row py-5 justify-content-center">
                <div class="col-12 text-center">
                   <p class="text-center"> &copy; copyright 2017 <p>
                   <p class="text-center"> site designed by <a href="#" class="text-muted"><i> izedomi </i></a>
                </div>
            </div>

          </div>
      </div>      
  <!-- footer section : ends -->



  <!-- modal - news : starts -->
    <div class="modal fade" id="news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">News</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
              <form method="post" action="add_content.php">
                <div class="form-group">
                    <label class="form-control-label" for="newsTitle">News Title</label>
                    <input type="text" name="news-title" class="form-control" id="newsTitle" placeholder="News Title" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="newsContent"> News Content </label><br/>
                    <textarea name="news-content" id="newsContent" cols="45" rows="150"></textarea>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="news" class="btn btn-primary">Add News</button>
                </div>
              </form>

          </div>         
        </div>
      </div>
    </div>
  <!-- modal - news : ends -->
 


  <!-- modal - category : starts -->
    <div class="modal fade" id="payment-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">payment category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="add_content.php">
              <div class="form-group">
                <label for="category" class="form-control-label">Category</label>
                <input type="text" name="p-category" class="form-control" id="category" required>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="category" class="btn btn-primary"> Add </button>
              </div>
            </form>
          </div>        
        </div>
      </div>
    </div>
  <!-- modal - category : ends -->

  <!-- modal - purpose : starts -->
    <div class="modal fade" id="payment-purpose" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Purpose</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="add_content.php">
                <div class="form-group">
                  <label for="p-purpose" class="form-control-label">Payment Purpose</label>
                  <input type="text" name="p-purpose" class="form-control" id="p-purpose" required>
                </div>

                <div class="form-group">
                  <label for="p-amount" class="form-control-label">Amount(#)</label>
                  <input type="text" name="p-amount" class="form-control" id="p-amount" required>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="purpose" class="btn btn-primary"> Add </button>
                </div>
             </form>
          </div>
        </div>
      </div>
    </div>
  <!-- modal : ends -->



  
       <!-- ckeditor script -->
    <script>
         ClassicEditor
        .create(document.querySelector('#newsContent'))
        .catch(error => {
            console.error(error);
        });
    </script>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../public/assets/js/jquery.min.js"></script>
    <script src="../public/assets/js/popper.min.js"></script>
    <script src="../public/assets/js/bootstrap.min.js"></script>
     <!-- custome JS -->
    <script src="../../public/assets/js/online_payment.js"></script>  
    
</body>
</html>../



























