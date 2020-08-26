<div id="section-loader" class="fullscreen show"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<section class="shadow py-3 px-xl-5 w-100" id="profile">
<!-- profile image upload -->
<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <div class="avatar-upload" id="avatar-upload">
                <div class="avatar-edit" id="avatar-edit">
                    <form class="hidden">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg .JPG .JPEG .PNG" />
                    <label for="imageUpload"></label>
                    </form>
                </div><i class="fa fa-upload" id="up-icon"></i>
                <div class="avatar-preview" id="avatar-preview">
                    <img src='../wp-content/themes/richco/images/avatar.png' id='image-preview' class="img-fluid rounded-circle shadow" />
                </div>
            </div>
        </div>
        <div id="photo_result" class="col-12 mr-auto width-100 mb-5"></div>
    </div>
    <!-- hidden upload form for image upload -->
    <form id="image_upload_form" method="post" enctype="multipart/form-data" action='upload.php' autocomplete="off">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="input_image_text" readonly>
                    <span class="input-group-btn">
                        <span class="btn btn-success btn-file">
                            Browse… <input type="file" id="photoimg" name="photoimg"/>
                        </span>
                        <button type="submit" class="btn btn-warning" id="submitUpload">
                            <i class="fa fa-upload"></i> upload
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </form>
    <!-- end hidden form-->
            
    <!-- end image upload -->
    <div class="row">            
        <div class="col-12 col-sm-6 form-fields">
            <div class="group" id="name">      
              <input type="text" class="profile-field" placeholder="" />
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Name</label>
            </div>

            <div class="group" id="email">      
              <input type="text" class="profile-field" placeholder='' />
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Email</label>
            </div>
        </div>
        <div class="col-12 col-sm-6 form-fields">
            <div class="group" id="address">      
              <input type="text" class="profile-field" placeholder='' />
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Address</label>
            </div>

             <div class="group" id="phone">      
              <input type="tel" class="profile-field" />
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Phone Number</label>
            </div>
        </div>
        <div class="col-12 col-sm-6 form-fields" id="company" >
            <div class="group">      
              <input type="text" class="profile-field" placeholder=''>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Company Name</label>
            </div>
        </div>
        <button class="btn btn-outline-green btn-lg" id="profile-save">Update</button>
    </div>
    <div class="col-12" id="result"></div>
</div><!-- end container -->
</section>